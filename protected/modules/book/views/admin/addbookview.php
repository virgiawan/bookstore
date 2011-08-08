<h2>Add Book</h2>
<?php $this->renderPartial('_formbook',array(
            'msg'=>$msg,
            'value'=>$value,
            'category'=>$category,
            'publisher'=>$publisher,
            'action'=>$action,
            'button'=>'Add',
));?>
