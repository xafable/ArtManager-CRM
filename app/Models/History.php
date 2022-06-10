<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $history;

    public $objectAction;
    public $objectData;
    public $oldValue;
    public $newValue;
    public $userName;



    protected static function booted()
    {
        static::retrieved(function ($model) {
            $model->history = $model->getHistory();
        });
    }

    public function getHistory()
    {
        $createdModel = new $this->model_type(json_decode($this->new_value,true));
        $createdModelArray = $createdModel->ToArray();

        if( $this->action == 'updated'){
            $updatedModel = new $this->model_type(json_decode($this->old_value,true));
            $updatedModelArray = $updatedModel->ToArray();

        }

        $this->objectAction = $this->getTranslate($this->action);
        $this->objectData = $this->getTranslate($this->data_name,$this->model_type);

        if( $this->action == 'updated'){
            $this->oldValue = $updatedModelArray[$this->data_name];
        }

        $this->newValue =  $this->action == 'updated' ? $createdModelArray[$this->data_name] : $createdModelArray[$this->getCreatedObjFieldName($this->model_type)];
        $this->userName = User::query()->find($this->user_id)->fio;

        return true;
    }

    private function getTranslate($word,$model_type = null)
    {
        $translate = '';

        if ($model_type == Attribute::class){

            $attribute = Attribute::query()->select('title_ru')->where('title_eng',$word)->first();
            return $attribute->title_ru.' на';

        }

        $arr_data = [
            'title'=>'Наименование на ',
            'customer'=>'Заказчика на ',
            'contact'=>'Контакт на ',
            'code'=>'Код объекта на ',
            'status_id'=>'Статус на ',
            'description'=>'Описание на ',
            'Media'=>'Вложение ',
            'Task'=>'Задачу ',
            'created'=>'Создал',
            'updated'=>'Обновил',
            'comment'=>'Заметку',
            'task'=>'Задачу'
        ];

        foreach ($arr_data as $key=>$value){
            if($word == $key) $translate = $value;
        }

        return empty($translate) ? $word : $translate;
    }


    private function getCreatedObjFieldName($fieldName){

        $data = [
            'App\Models\Task'=>'title',
            'App\Models\Comment'=>'comment',
            'App\Models\File'=>'title',

        ];

        foreach ($data as $key=>$value){
            if($fieldName == $key) return $value;
        }

    }
}
