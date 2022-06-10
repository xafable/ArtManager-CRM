<?php
namespace App\Traits;

use App\Models\History;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Auth;

trait  HasHistory{
    protected  $originalModel;
    protected  $updatedModel;
    protected  $action;

    protected static function bootHasHistory()
    {
        static::updated(function ($model) {
            $model->updatedModel = clone $model;
            $model->action = 'updated';
        });
        static::retrieved(function ($model) {
            $model->originalModel = clone $model;
            $model->action = 'retrieved';
        });
        static::created(function ($model) {
            $model->updatedModel = clone $model;
            $model->action = 'created';
        });
    }

    /**
     * @return Model
     */
    public function getOriginalModel(){
        return $this->originalModel;
    }
    /**
     * @return Model
     */
    public function getUpdatedModel(){
        return $this->updatedModel;
    }
    /**
     * @return string
     */
    public function getAction(){
        return $this->action;
    }
    /**
     * @return morphMany
     */
    public function history(){
        return $this->morphMany(History::class, 'historyble');
    }

    public function SaveHistory($child_model = null)
    {
        if($child_model != null)
        {
            if($child_model->getAction() == 'retrieved') return false;

            $changes = $child_model->getChanges();

            $this->history()->create([
                'data_name'=>$child_model->getAction() == 'updated' ? implode(array_keys($changes)) : strtolower(explode('\\',get_class($child_model))[2]),
                'model_type'=>get_class($child_model),
                'old_value'=>$child_model->getAction() == 'updated' ? $child_model->getOriginalModel()->toJson() : '',
                'new_value'=>$child_model->getUpdatedModel()->toJson(),
                'user_id'=>Auth::id(),
                'action'=>$child_model->getAction()]);

            return true;
        }

        $changes = $this->getChanges();

        if(empty($changes)) return false;

        $action = $this->getAction();
        $original = $this->getOriginalModel();
        $updated = $this->getUpdatedModel();

        unset($changes['updated_at']);


        foreach ($changes as $key=>$value){
            History::query()->create([
                'historyble_id'=> $this->id,
                'historyble_type'=> (string)get_class($this),
                'data_name'=> $key,
                'model_type'=> get_class($this),
                'old_value'=> $action == 'updated' ? $original->toJson() : '',
                'new_value'=> $updated->toJson(),
                'user_id'=> Auth::id(),
                'action'=> $action, ]);
        }

        return true;

    }
}
