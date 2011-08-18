<h2>Update Book</h2>
<?php $this->renderPartial('_formbook',array(
        'msg'=>$msg,
        'value'=>$value,
        'category'=>$category,
        'publisher'=>$publisher,
        'button'=>'Update',
));?>