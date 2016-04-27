{include file="{$tpl_folder_admin}/header-admin.tpl"}
{include file="{$tpl_folder_admin}/admin-top.tpl"}

<div class="wraper">
    <div class="content-wrap row admin-login">

            <div class=" col-md-12">
                <div class="col-md-4">&nbsp;</div>

                <div class="col-md-4">
                    <h2 class="tell_pb left">Login in admin section</h2>
                    <div class="clear" ></div>

                    <div class="box_client_line"></div>
                    <div class="clear" ></div>

                    <div class="error_message">

                        {if $error}
                            {$error}
                        {else}
                        {/if}

                    </div>

                    <div class="clear" ></div>
                    <form name="problem" class="form_pb" action="{$admin_login_url}" method="post">
                        <div class="form-group">
                            <input type="text" name="user_email" class="pb_input_title" placeholder="Email"  id="login_email" value="{$user_email}"/>
                        </div>

                        <div class="form-group">
                            <input type="password" name="user_password" class="pb_input_title" placeholder="Password"  id="login_pass" value=""/>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-2"></div>
                            <div class="col-md-8"><input class="btn btn-primary" type="submit" value="Login" name="login_to_admin" id="login-btn"/></div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="clear" style="margin-bottom: 30px;"></div>

                    </form>
                </div>
                <div class="col-md-4">&nbsp;</div>
            </div>


    </div>

</div>

{*{$tpl_folder_admin}/footer.tpl}*}
