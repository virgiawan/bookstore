<b class="msg"><?php $this->widget('ErrorDisplayWidget',array('msg'=>$msg));?></b>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="bid" value="<?php echo isset($value->b_id)?$value->b_id:"";?>"/>
    <table>
        <tr>
            <td>Book Title</td><td>:</td>
            <td><input type="text" name="b_title" value="<?php echo isset($value->b_title)?$value->b_title:"";?>" /></td>
        </tr>
        <tr>
            <td>Publisher</td><td>:</td>
            <td>
                <select name="b_publisher">
                    <option value="">-- select publisher --</option>
                    <?php foreach($publisher as $pub):?>
                        <?php if(isset($value->b_publisher)):?>
                            <?php if($value->b_publisher==$pub->p_id):?>
                                <option value="<?php echo $pub->p_id;?>" selected><?php echo $pub->p_publisher;?></option>
                            <?php else:?>
                                <option value="<?php echo $pub->p_id;?>"><?php echo $pub->p_publisher;?></option>
                            <?php endif;?>
                        <?php else:?>
                            <option value="<?php echo $pub->p_id;?>"><?php echo $pub->p_publisher;?></option>
                        <?php endif;?>
                    <?php endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Category</td><td>:</td>
            <td>
                <select name="b_category">
                    <option value="">-- select category --</option>
                    <?php foreach($category as $cat):?>
                        <?php if(isset($value->b_category)):?>
                            <?php if($value->b_category==$cat->c_id):?>
                                <option value="<?php echo $cat->c_id?>" selected><?php echo $cat->c_category;?></option>
                            <?php else:?>
                                <option value="<?php echo $cat->c_id?>"><?php echo $cat->c_category;?></option>
                            <?php endif;?>
                        <?php else:?>
                            <option value="<?php echo $cat->c_id?>"><?php echo $cat->c_category;?></option>
                        <?php endif;?>
                    <?php endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Author</td><td>:</td>
            <td><input type="text" name="b_author" value="<?php echo isset($value->b_author)?$value->b_author:"";?>"/></td>
        </tr>
            <td>Year</td><td>:</td>
            <td><input type="text" name="b_year" value="<?php echo isset($value->b_year)?$value->b_year:"";?>"/></td>
        <tr>
            <td>Price</td><td>:</td>
            <td><input type="text" name="b_price" value="<?php echo isset($value->b_price)?$value->b_price:"";?>"/></td>
        </tr>
        <tr>
            <td>Stock</td><td>:</td>
            <td><input type="text" name="b_stock" value="<?php echo isset($value->b_stock)?$value->b_stock:"";?>"/></td>
        </tr>
            <td>Description</td><td>:</td>
            <td><?php $this->widget('application.extensions.tinymce.ETinyMce',array('name'=>'b_description','value'=>isset($value->b_description)?$value->b_description:"","height"=>'200px',"width"=>'390px'));?></td>
        <tr>
            <td>Image</td><td>:</td>
            <td><input type="file" name="Book[b_image]"/></td>
        </tr>
        <?php if(isset($value->b_image)):?>
            <tr>
                <td>&nbsp;</td><td>&nbsp;</td>
                <td><img src="<?php echo Yii::app()->request->baseUrl."/imgbook/resize/".$value->b_image;?>"  width="100px" height="150px"/></td>
            </tr>
        <?php endif;?>
        <tr>
            <td colspan="3">
                <input type="submit" value="<?php echo $button?>"/>
            </td>
        </tr>
    </table>
</form>
