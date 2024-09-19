<form method="post" action="<?= ($BASE) ?>/<?= (strtolower($page['title'])) ?>/create" enctype="multipart/form-data" class="biodata">
    <input type="hidden" name="type" value="<?= ($type) ?>" />
    <input type="hidden" name="step" value="biodata" />
    <input type="hidden" name="id" value="<?= (isset($profile) ? $profile->id:'') ?>" />
    <input type="hidden" name="action" value="<?= (isset($profile) ? 'update':'insert') ?>" />
    <?php if (isset($profile) && $profile->picture_path !==''): ?>
        
            <div class="form-group">
                <img src="<?= ($BASE) ?>/<?= ($profile->picture_path) ?>" width="200px" />
            </div>
        
    <?php endif; ?>
    <div class="form-group">
        <label>Passport</label>
        <input type="file" class="form-control" name="passport" accept="image/png, image/jpeg" required="required"/>
    </div>
    <div class="form-group">
        <label>Names</label>
        <input type="text" class="form-control" id='name'  name='name' value="<?= (isset($profile) ? $profile->name:'') ?>">  
        <span  class="form-text">Enter names</span> 
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Date of birth</label>
                <input type="date" class="form-control" id='dob'  name='dob' value="<?= (isset($profile) ? $profile->dob:'') ?>">  
                <span  class="form-text">Enter Political Party of President</span> 
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Date of first join politics</label>
                <input type="date" class="form-control" id='dofjp'  name='dofjp' value="<?= (isset($profile) ? $profile->date_join_politics:'') ?>">  
                <span  class="form-text">Enter Political Party of President</span> 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Gender</label>
                <select name="gender" class="form-control">
                    <option value="">-Select gender-</option>
                    <option value="MALE" <?= (isset($profile) && $profile->gender=='MALE'?'selected="selected"':'') ?>>Male</option>
                    <option value="FEMALE"<?= (isset($profile) && $profile->gender=='FEMALE'?'selected="selected"':'') ?>>Female</option>
                </select>
                <span class="form-text">Select gender</span> 
            </div>   
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>State of Origin</label>
                <select name="state" class="form-control state">
                    <option value="Invalid Selection">-Select State-</option>
                    <?php foreach (($states?:[]) as $state): ?>
                        <option value="<?= ($state) ?>" <?= (isset($profile) && $profile->state==$state?'selected="selected"':'') ?>><?= ($state) ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="form-text">Select Origin of President</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Local Govts</label>
                <select name="lga" class="form-control lga">
                    <option value="Invalid Selection">-Select Local Govts-</option>
                    <?php if (isset($profile) && $lgas): ?>
                        
                            <?php foreach (($lgas?:[]) as $lga): ?>
                                <option value="<?= ($lga) ?>" <?= (isset($profile) && $profile->lga==$lga?'selected="selected"':'') ?>><?= ($lga) ?></option>
                            <?php endforeach; ?>
                        
                    <?php endif; ?>
                </select>
                <span  class="form-text">Select Religion</span> 
            </div>
        </div>
    </div>
    

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Town</label>
                <input type="text" class="form-control"   id='town'  name='town' value="<?= (isset($profile) ? $profile->town:'') ?>">  
                <span  class="form-text">Enter Political Party of President</span> 
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Citizenship</label>
                <input type="text" class="form-control"   id='citizenship'  name='citizenship' value="<?= (isset($profile) ? $profile->citizenship:'') ?>">  
                <span  class="form-text">Enter Political Party of President</span> 
            </div>
        </div>
    </div>
    

    
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Religion</label>
                <select name="religion" class="form-control">
                    <option value="Invalid Selection">-Select Religion-</option>
                    <option value="Christian" <?= (isset($profile) && $profile->religion=='Christian'?'selected="selected"':'') ?>>Christian</option>
                    <option value="Islam" <?= (isset($profile) && $profile->religion=='Islam'?'selected="selected"':'') ?>>Islam</option>
                    <option value="Traditional" <?= (isset($profile) && $profile->religion=='Traditional'?'selected="selected"':'') ?>>Traditional</option>
                    <option value="Atheist" <?= (isset($profile) && $profile->religion=='Atheist'?'selected="selected"':'') ?>>Atheist</option>
                    <option value="Agnostic" <?= (isset($profile) && $profile->religion=='Agnostic'?'selected="selected"':'') ?>>Agnostic</option>
                    <option value="Animist" <?= (isset($profile) && $profile->religion=='Animist'?'selected="selected"':'') ?>>Animist</option>
                    <option value="Buddhist" <?= (isset($profile) && $profile->religion=='Buddhist'?'selected="selected"':'') ?>>Buddhist</option>
                    <option value="Other" <?= (isset($profile) && $profile->religion=='Other'?'selected="selected"':'') ?>>Others</option>
                </select>
                <span  class="form-text">Select Religion</span> 
            </div>   
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Political Party</label>
                <select name="party" class="form-control state">
                    <option value="Invalid Selection">-Select political party-</option>
                    <?php foreach (($parties?:[]) as $party): ?>
                        <option value="<?= ($party['id']) ?>" <?= (isset($profile) && $profile->political_party==$party['id']?'selected="selected"':'') ?>><?= ($party['name']) ?></option>
                    <?php endforeach; ?>
                </select>  
                <span  class="form-text">Enter Political Party of President</span> 
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Political Position</label>
                <select name="position" class="form-control state">
                    <option value="Invalid Selection">-Select political position-</option>
                    <?php foreach (($positions?:[]) as $position): ?>
                        <option value="<?= ($position['id']) ?>" <?= (isset($profile) && $profile->position==$position['id']?'selected="selected"':'') ?>><?= ($position['name']) ?></option>
                    <?php endforeach; ?>
                </select>   
                <span  class="form-text">Enter Political Party of President</span> 
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Occupation</label>
        <input type="text" class="form-control" id='occupation' name='occupation' value="<?= (isset($profile) ? $profile->occupation:'') ?>">  
        <span  class="form-text">Enter occupation</span> 
    </div>

    <div class="form-group">
        <label>Previous office held</label>
        <input type="text" class="form-control" id='previous_offices' name='previous_offices' value="<?= (isset($profile) ? $profile->previous_offices:'') ?>">  
        <span  class="form-text">Enter the previous offices held</span> 
    </div>
    
    
    <hr/>
    <div class="form-group" id="sign_button">
        <div class="row">
            <div class="col-md-10">
                <input type="button" value="Back" name="submit1" id="prevBtn" class="btn btn-secondary" onclick="nextPrev(-1)"/> 
                <input type="button" value="Save and Continue" name="Next" id="nextBtn" class="btn btn-secondary" onclick="nextPrev(1)" /> 
            </div>
            <?php if (isset($profile)): ?>
                
                    <div class="col-md-2">
                        <input type="button" value="Skip" name="skip" id="nextBtn" class="btn btn-primary" onclick="skipNext(1)" /> 
                    </div>
                
            <?php endif; ?>
            
        </div>
    </div>
</form>