<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-06 15:38:38
         compiled from "/var/www/akiva//tpl/admin-1000/article-all-versions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:446283227572c904e9559b2-84228191%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0c1d94ecf949f6428282b3f4fa7b9b34786cf59' => 
    array (
      0 => '/var/www/akiva//tpl/admin-1000/article-all-versions.tpl',
      1 => 1462375188,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '446283227572c904e9559b2-84228191',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'article' => 0,
    'section_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_572c904e98c671_25624066',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572c904e98c671_25624066')) {function content_572c904e98c671_25624066($_smarty_tpl) {?>
    <div id="English" class="tab-pane fade in active">
        <h2><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</h2>
        <p>All versions from last -> first</p>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Version content</th>
                <th width="120">Version date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>
                    <div class="version_holder"><?php echo $_smarty_tpl->tpl_vars['article']->value['version_1'];?>
</div>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['article']->value['version_1_date'];?>
</td>
            </tr>
            <tr>
                <td>2</td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['article']->value['version_2']!='') {?><div><button class="btn-danger btn button-margin" onclick="revert_article_to_version('<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
', 2, '<?php echo $_smarty_tpl->tpl_vars['section_type']->value;?>
')">Revert to this version</button></div><?php }?>
                    <div class="version_holder"><?php echo $_smarty_tpl->tpl_vars['article']->value['version_2'];?>
</div></td>
                <td><?php echo $_smarty_tpl->tpl_vars['article']->value['version_2_date'];?>
</td>
            </tr>
            <tr>
                <td>3</td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['article']->value['version_3']!='') {?><div><button class="btn-danger btn button-margin" onclick="revert_article_to_version('<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
', 3, '<?php echo $_smarty_tpl->tpl_vars['section_type']->value;?>
')">Revert to this version</button></div><?php }?>
                    <div class="version_holder"><?php echo $_smarty_tpl->tpl_vars['article']->value['version_3'];?>
</div></td>
                <td><?php echo $_smarty_tpl->tpl_vars['article']->value['version_3_date'];?>
</td>
            </tr>
            <tr>
                <td>4</td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['article']->value['version_4']!='') {?><div><button class="btn-danger btn button-margin" onclick="revert_article_to_version('<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
', 4, '<?php echo $_smarty_tpl->tpl_vars['section_type']->value;?>
')">Revert to this version</button></div><?php }?>
                    <div class="version_holder"><?php echo $_smarty_tpl->tpl_vars['article']->value['version_4'];?>
</div></td>
                <td><?php echo $_smarty_tpl->tpl_vars['article']->value['version_4_date'];?>
</td>
            </tr>
            <tr>
                <td>5</td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['article']->value['version_5']!='') {?> <div><button class="btn-danger btn button-margin" onclick="revert_article_to_version('<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
', 5, '<?php echo $_smarty_tpl->tpl_vars['section_type']->value;?>
')">Revert to this version</button></div><?php }?>
                    <div class="version_holder"><?php echo $_smarty_tpl->tpl_vars['article']->value['version_5'];?>
</div></td>
                <td><?php echo $_smarty_tpl->tpl_vars['article']->value['version_5_date'];?>
</td>
            </tr>
            <tr>
                <td>6</td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['article']->value['version_6']!='') {?><div><button class="btn-danger btn button-margin" onclick="revert_article_to_version('<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
', 6, '<?php echo $_smarty_tpl->tpl_vars['section_type']->value;?>
')">Revert to this version</button></div><?php }?>
                    <div class="version_holder"><?php echo $_smarty_tpl->tpl_vars['article']->value['version_6'];?>
</div></td>
                <td><?php echo $_smarty_tpl->tpl_vars['article']->value['version_6_date'];?>
</td>
            </tr>
            <tr>
                <td>7</td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['article']->value['version_7']!='') {?><div><button class="btn-danger btn button-margin" onclick="revert_article_to_version('<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
', 7, '<?php echo $_smarty_tpl->tpl_vars['section_type']->value;?>
')">Revert to this version</button></div><?php }?>
                    <div class="version_holder"><?php echo $_smarty_tpl->tpl_vars['article']->value['version_7'];?>
</div></td>
                <td><?php echo $_smarty_tpl->tpl_vars['article']->value['version_7_date'];?>
</td>
            </tr>
            <tr>
                <td>8</td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['article']->value['version_8']!='') {?><div><button class="btn-danger btn button-margin" onclick="revert_article_to_version('<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
', 8, '<?php echo $_smarty_tpl->tpl_vars['section_type']->value;?>
')">Revert to this version</button></div><?php }?>
                    <div class="version_holder"><?php echo $_smarty_tpl->tpl_vars['article']->value['version_8'];?>
</div></td>
                <td><?php echo $_smarty_tpl->tpl_vars['article']->value['version_8_date'];?>
</td>
            </tr>
            <tr>
                <td>9</td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['article']->value['version_9']!='') {?><div><button class="btn-danger btn button-margin" onclick="revert_article_to_version('<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
', 9, '<?php echo $_smarty_tpl->tpl_vars['section_type']->value;?>
')">Revert to this version</button></div><?php }?>
                    <div class="version_holder"><?php echo $_smarty_tpl->tpl_vars['article']->value['version_9'];?>
</div></td>
                <td><?php echo $_smarty_tpl->tpl_vars['article']->value['version_9_date'];?>
</td>
            </tr>
            <tr>
                <td>10</td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['article']->value['version_10']!='') {?><div><button class="btn-danger btn button-margin" onclick="revert_article_to_version('<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
', 10, '<?php echo $_smarty_tpl->tpl_vars['section_type']->value;?>
')">Revert to this version</button></div><?php }?>
                    <div class="version_holder"><?php echo $_smarty_tpl->tpl_vars['article']->value['version_10'];?>
</div></td>
                <td><?php echo $_smarty_tpl->tpl_vars['article']->value['version_10_date'];?>
</td>
            </tr>
            </tbody>
        </table>
    </div>
<?php }} ?>
