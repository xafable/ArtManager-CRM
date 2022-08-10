$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});


let woTypeFieldsCounter = 0;
let statusTypeFieldsCounter = 0;
let enumFieldsCounter = 0;
let additionalAttributeCounter = 0;
let editAdditionalAttributesEnabled = false;

function submitWorkObject(){
    let el = document.getElementById("workObjectEditForm");
    let formData =  new FormData(el);
    fetch('http://artmanager-crm/object/update',{
        body: formData,
        method: "POST"
    }).then(r =>  r.json().then(data => ({status: r.status, body: data})))
       .then((data) => {

            if(data.status ===422){
                let alertUl = document.getElementById("alertUl");
                alertUl.innerHTML = "";
                document.getElementById("alertDiv").removeAttribute('hidden');
                Object.values(data.body).forEach(val => {
                    var li = document.createElement("li");
                    li.innerHTML = val;
                    alertUl.appendChild(li);

                });
                window.scrollTo(0, 0);
            }
            else if(data.status ===200){
                let successDiv = document.getElementById("successDiv");
                successDiv.innerHTML = "Обновлен";
                successDiv.removeAttribute('hidden');
                window.scrollTo(0, 0);

            }


        });
}

function addFieldToAdditionalAttribute(button){
    let parent = document.getElementById(button.parentElement.id);
    let attributeTitle = parent.querySelector("#attributeTitle").value;
    let attributeQuantity = parent.querySelector("#attributeQuantity").value;
    let attributeNumerate = parent.querySelector("#attributeNumerate");

    if(attributeTitle.length < 1){
        parent.querySelector("#attributeTitle").focus();
        return;
    }

    let attribute = document.getElementById("additionalAttributeTemplate").cloneNode( true );
    attribute.removeAttribute("hidden");

    let form = document.getElementById("form");

    if(attributeQuantity > 1){
        for(let i = 0;i < attributeQuantity;i++){
            attribute.name = "";
            attribute.querySelector("#span").innerHTML = attributeNumerate.checked ? attributeTitle + ' ' + (i + 1) : attributeTitle;
            attribute.querySelector("#value").name = `newAttribute[${additionalAttributeCounter}][value]`;
            attribute.querySelector("#title").name = `newAttribute[${additionalAttributeCounter}][title]`;
            attribute.querySelector("#title").value = attributeNumerate.checked ?  attributeTitle + ' ' + (i + 1) : attributeTitle;

            form.appendChild(attribute.cloneNode(true));
            additionalAttributeCounter++;
        }
    }
    else{
        attribute.querySelector("#span").innerHTML = attributeTitle;
        attribute.querySelector("#value").name = `newAttribute[${additionalAttributeCounter}][value]`;
        attribute.querySelector("#title").name = `newAttribute[${additionalAttributeCounter}][title]`;
        attribute.querySelector("#title").value = attributeTitle;
        form.appendChild(attribute);
        additionalAttributeCounter++;

    }
    if(!editAdditionalAttributesEnabled)
        enableEditAdditionalAttributes();


}

function deleteFieldFromAdditionalAttribute(button){
    if(button.parentElement.hasAttribute("data-oldAttribute")){
        let input = document.createElement("input");
        input.name = "deleteAttributes[]";
        input.value = button.dataset.attributeId;
        input.style.visibility = "hidden";

        let form = document.getElementById("form");
        form.appendChild(input);
    }

    button.parentElement.remove();

}

function fieldFormatOnChange(obj){

    let typeFieldId = obj.getAttribute("data-typeFieldId");
    let parent = document.getElementById(typeFieldId);
    let enumSelect = parent.querySelector("#enumSelector");


    if(obj.value == 'enum'){
        enumSelect.style.visibility = 'visible';
    }
    else{
        enumSelect.style.visibility = 'hidden';
    }
}

function addFieldToWorkObjectType(obj){
    let input = document.getElementById("paramTemplate").cloneNode( true );
    let id_ = "_"+woTypeFieldsCounter+"_";
    input.removeAttribute("hidden");
    input.id = "fieldParam"+id_ ;
    input.innerHTML = input.innerHTML.replace(/_0_/g, id_);

    document.getElementById("fieldParams").appendChild(input);
    woTypeFieldsCounter++;
}


function deleteFieldFromWorkObjectType(obj){
    let numId = obj.parentElement.id.replace( /^\D+/g, '');
    let param = document.getElementById(obj.parentElement.id);
    if(obj.parentElement.id.includes("fieldParam")){
        var input = document.createElement("input");
        input.style.display = "none";
        input.value = numId;
        input.type = "text";
        input.name = "fieldsForDelete[]";
        document.getElementById("fieldParams").insertBefore(input,  document.getElementById("fieldParams").firstChild);
    }
    param.remove();
}

function addFieldToStatusType(){
    let input = document.getElementById("fieldTemplate").cloneNode( true );
    let id_ = "_"+statusTypeFieldsCounter+"_";
    input.removeAttribute("hidden");
    input.id = "fieldStatus"+id_ ;
    input.innerHTML = input.innerHTML.replace(/_0_/g, id_);
    document.getElementById("fieldStatuses").appendChild(input);
    statusTypeFieldsCounter++;
}

function deleteFieldFromStatusType(obj){
    let numId = obj.parentElement.id.replace( /^\D+/g, '');
    let param = document.getElementById(obj.parentElement.id);
    let input = document.createElement("input");
    input.style.display = "none";
    input.value = numId;
    input.type = "text";
    input.name = "fieldsForDelete[" + numId + "]";

    document.getElementById("fieldStatuses").insertBefore(input,  document.getElementById("fieldStatuses").firstChild);
    param.remove();
}

function addFieldToEnumEdit(){

    let input = document.getElementById("enumTemplate").cloneNode( true );
    let id_ = enumFieldsCounter;
    input.removeAttribute("hidden");
    input.id = "enumField"+id_ ;
    input.innerHTML = input.innerHTML.replace(/_0_/g, "_"+id_+"_");

    document.getElementById("fieldEnums").appendChild(input);
    enumFieldsCounter++;
}

function deleteFieldFromEnumEdit(button){
    let numId = button.parentElement.id.replace( /^\D+/g, '');
    let input = document.createElement("input");
    input.style.display = "none";
    input.value = numId;
    input.type = "text";
    input.name = "fieldsForDelete[" + numId + "]";

    document.getElementById("fieldEnums").appendChild(input);
    button.parentElement.remove();

}

function addPerformer(obj){
    var shown = document.getElementById("valueDataList");
    let svalue = shown.value;
    var value2send = document.querySelector("#datalistOptions option[value='"+svalue+"']").dataset.value;
    document.getElementById(value2send).remove();
    shown.value = '';

    let button = document.createElement('button');
    button.className = 'btn btn-outline-primary mb-2';
    button.innerHTML = svalue;
    button.setAttribute('onclick','delPerformer(this)');
    button.value = value2send;

    let input = document.createElement('input');
    input.name = 'performers[]';
    input.value = value2send;
    input.style.display  = 'none';
    input.id = 'performer'+ value2send;

    document.getElementById("performers").appendChild(button);
    document.getElementById("performers").appendChild(input);

}

function delPerformer(obj){
    let dataList = document.getElementById("datalistOptions");
    let option = document.createElement('option');
    option.value = obj.innerHTML;
    option.setAttribute('data-value',obj.value);
    option.id = obj.value;

    dataList.appendChild(option);
    document.getElementById('performer'+obj.value).remove();
    obj.remove();

}

function delWorkObjectType(id){
    let dataList = document.getElementById("datalistOptions");
    let option = document.createElement('option');
    option.value = obj.innerHTML;
    option.setAttribute('data-value',obj.value);
    option.id = obj.value;

    dataList.appendChild(option);
    document.getElementById('performer'+obj.value).remove();
    obj.remove();
}

function rWoTypeOptSelectAllFields(){
    let inputs = document.querySelectorAll('[data-field="1"]');

    inputs.forEach(function(item,key,list){
        item.checked = true;
    });
}

function enableEditWorkObject(button) {
    document.querySelectorAll('[data-attribute]').forEach(function (attribute){
        attribute.removeAttribute('disabled');

    });

    document.getElementById("objectUpdateButton").removeAttribute('hidden');
    document.getElementById("objectDeleteButton").removeAttribute('hidden');

    button.remove();

}

function enableEditAdditionalAttributes(button) {
    document.getElementById("additionalAttributesFieldset").removeAttribute('disabled');
    document.getElementById("additionalAttributeUpdateButton").removeAttribute('hidden');

    let deleteButtons = document.querySelectorAll('[data-delete-button]');

    if(deleteButtons){
        deleteButtons.forEach(function (deleteButton){
            deleteButton.removeAttribute('hidden');
        });
    }

    button.remove();
    editAdditionalAttributesEnabled = true;
}


