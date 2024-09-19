<div class="row ">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card-body">
            
            <p class="subtitle margin-bottom-20">Fill the form to post a new job vacancy</p>
            <?php foreach ((\Flash::instance()->getMessages()?:[]) as $msg): ?>
                <div class="alert alert-<?= ($msg['status']) ?> alert-dismissable">
                    <?= ($msg['text'])."
" ?>
                </div>
            <?php endforeach; ?>
            <form method="post" action="<?= ($BASE) ?>/messaging/compose">
                <div class="form-group">
                    <label>To</label>
                    <textarea class="form-control" rows="1%" cols="100%" name="to"></textarea>
                </div>
                <!-- <div class="form-group">
                    <label>CC</label>
                    <textarea class="form-control" rows="1%" cols="100%" name="cc"></textarea>
                </div> -->
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" name="subject" class="form-control" required="required" >
                </div>
                <div class="form-group">
                    <textarea class="form-control editor" name="content" rows="10%" cols="100%" style="height: 400px !important;"></textarea>
                </div>
                <hr/>
                
                <div class="form-group" id="sign_button">
                    <button type="submit" class="btn btn-secondary">Send</button>
                </div>
            </form>
    
        </div>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        $('.editor').editor({"height" : "350px"});
    })
</script>