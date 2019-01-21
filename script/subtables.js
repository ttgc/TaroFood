$(document).ready(function(){
    $('button.subtable-btn').click(function(){
        $('tr#'+this.id).toggle();
        if($('tr#'+this.id).attr('style').length!=0){
            this.innerHTML='<i class="fas fa-plus"></i>';
        }else{
            this.innerHTML='<i class="fas fa-minus"></i>';
        }
    });
});