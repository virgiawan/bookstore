<?php
/**
 * errordisplayview class file.
 *
 * @version Apr 19, 2010, 11:11:04 AM
 * @author  Rifqi Alfian <rifqi@onebitmedia.com>
 * @link    http://onebitmedia.com/
 */
?>

<?php if(!empty($msg)): ?>
        
            <?php if(!is_array($msg)): ?>
                <p style="margin-left:15px;">
                <?php echo $msg; ?>
                </p>
            <?php else: ?>
                <ul style="margin-left:15px;">
                <?php foreach($msg as $i): ?>
                    <?php if(!is_array($i)): ?>
                        <?php echo $i; ?>
                    <?php else: ?>
                        <?php foreach($i as $j): ?>
                                <li><?php echo $j; ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        
<?php endif; ?>