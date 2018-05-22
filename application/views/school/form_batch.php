<style>
    .form-modal .modal-content{
        border-radius: 0px !important;
        /*height: 100px;*/
    }
    #batch-form{
        padding: 100px;
    }
</style>
<form id="batch-form"  class="col-xs-12" method="post">
    <div class="form-msg "></div>
    <div class="form-group " >
        <label for="course_code" >School Year</label>
        <input class="form-control input-sm text-right number" name="new_batch_year" type="number" maxlength="4" placeholder="<?=date('Y')?>">
    </div>

    <div class="form-group text-right">
        <input class=" btn-lg btn-primary" name="course_add" type="submit" value="submit">
    </div>
</form>