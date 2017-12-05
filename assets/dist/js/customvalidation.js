function validate(id,errordata,msg){
    if($("#"+id).val()==""){
        $("#"+errordata).html(msg);
    }else{
        $("#"+errordata).html();
    }
}