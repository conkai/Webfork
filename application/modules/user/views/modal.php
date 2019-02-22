<?php
if (isset($_POST['button_changeavatar'])):
  $valueAvatar = $_POST['radioAvatars'];
  $this->user_model->insertAvatar($valueAvatar);
endif;

if (isset($_POST['button_uppdateinfo'])):
  $country = $_POST['country_us'];
  $user = $this->session->userdata('fx_sess_username');
  $mail = $this->session->userdata('fx_sess_email');
  $id = $this->session->userdata('fx_sess_id');

  $this->user_model->updateInformation($id, $user, $mail, $country);
endif; ?>

    <div id="changePassword" uk-modal="bg-close: false">
      <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
          <h2 class="uk-modal-title uk-text-uppercase"><i class="fas fa-key"></i> <?= $this->lang->line('button_change_password'); ?></h2>
        </div>
        <form action="" method="post" accept-charset="utf-8">
          <div class="uk-modal-body">
            <div class="uk-margin">
              <div class="uk-form-controls uk-light">
                <div class="uk-inline uk-width-1-1">
                  <span class="uk-form-icon uk-form-icon-flip"><i class="fas fa-lock-open fa-lg"></i></span>
                  <input class="uk-input" name="oldpass" type="password" pattern=".{5,16}" placeholder="<?= $this->lang->line('form_old_password'); ?>" required>
                </div>
              </div>
            </div>
            <div class="uk-margin">
              <div class="uk-form-controls uk-light">
                <div class="uk-inline uk-width-1-1">
                  <span class="uk-form-icon uk-form-icon-flip"><i class="fas fa-lock fa-lg"></i></span>
                  <input class="uk-input" name="newpass" type="password" pattern=".{5,16}" placeholder="<?= $this->lang->line('form_new_password'); ?>" required>
                </div>
              </div>
            </div>
            <div class="uk-margin">
              <div class="uk-form-controls uk-light">
                <div class="uk-inline uk-width-1-1">
                  <span class="uk-form-icon uk-form-icon-flip"><i class="fas fa-lock fa-lg"></i></span>
                  <input class="uk-input" name="newpassr" type="password" pattern=".{5,16}" placeholder="<?= $this->lang->line('form_re_password'); ?>" required>
                </div>
              </div>
            </div>
          </div>
          <div class="uk-modal-footer uk-text-right actions">
            <button class="uk-button uk-button-danger uk-modal-close" type="button"><i class="fas fa-times-circle"></i> <?= $this->lang->line('button_cancel'); ?></button>
            <button class="uk-button uk-button-default" type="submit" name="button_changepass"><i class="fas fa-sync-alt"></i> <?= $this->lang->line('button_change'); ?></button>
          </div>
        </form>
      </div>
    </div>

    <div id="changeEmail" uk-modal="bg-close: false">
      <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
          <h2 class="uk-modal-title uk-text-uppercase"><i class="far fa-envelope"></i> <?= $this->lang->line('button_change_email'); ?></h2>
        </div>
        <form action="" method="post" accept-charset="utf-8">
          <div class="uk-modal-body">
            <div class="uk-margin">
              <div class="uk-form-controls uk-light">
                <div class="uk-inline uk-width-1-1">
                  <span class="uk-form-icon uk-form-icon-flip"><i class="fas fa-unlock-alt fa-lg"></i></span>
                  <input class="uk-input" name="password" type="password" pattern=".{5,16}" placeholder="<?= $this->lang->line('form_password'); ?>" required>
                </div>
              </div>
            </div>
            <div class="uk-margin">
              <div class="uk-form-controls uk-light">
                <div class="uk-inline uk-width-1-1">
                  <span class="uk-form-icon uk-form-icon-flip"><i class="fas fa-envelope-open fa-lg"></i></span>
                  <input class="uk-input" name="oldemail" type="email" placeholder="<?= $this->lang->line('form_old_email'); ?>" required>
                </div>
              </div>
            </div>
            <div class="uk-margin">
              <div class="uk-form-controls uk-light">
                <div class="uk-inline uk-width-1-1">
                  <span class="uk-form-icon uk-form-icon-flip"><i class="fas fa-envelope fa-lg"></i></span>
                  <input class="uk-input" name="newemail" type="email" placeholder="<?= $this->lang->line('form_new_email'); ?>" required>
                </div>
              </div>
            </div>
          </div>
          <div class="uk-modal-footer uk-text-right actions">
            <button class="uk-button uk-button-danger uk-modal-close" type="button"><i class="fas fa-times-circle"></i> <?= $this->lang->line('button_cancel'); ?></button>
            <button class="uk-button uk-button-default" type="submit" name="button_changeemail"><i class="fas fa-sync-alt"></i> <?= $this->lang->line('button_change'); ?></button>
          </div>
        </form>
      </div>
    </div>

    <div id="avatars" uk-modal="bg-close: false">
      <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
          <h2 class="uk-modal-title uk-text-uppercase"><i class="fas fa-camera"></i> <?= $this->lang->line('button_change_avatar'); ?></h2>
        </div>
        <form action="" method="post" accept-charset="utf-8">
          <div class="uk-modal-body">
            <div class="uk-margin">
              <div class="uk-form-controls">
                <div class="uk-grid uk-grid-medium uk-child-width-1-3 uk-child-width-1-4@s uk-child-width-1-5@m uk-flex-center uk-text-center">
                  <?php foreach($this->user_model->getAllAvatars()->result() as $allAvts): ?>
                    <div>
                      <img class="uk-border-rounded" src="<?= base_url('includes/images/profiles/'.$allAvts->name); ?>" width="100" height="100">
                      <input class="uk-radio" type="radio" name="radioAvatars" value="<?= $allAvts->id ?>" checked>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="uk-modal-footer uk-text-right actions">
            <button class="uk-button uk-button-danger uk-modal-close" type="button"><i class="fas fa-times-circle"></i> <?= $this->lang->line('button_cancel'); ?></button>
            <button class="uk-button uk-button-default" type="submit" name="button_changeavatar"><i class="fas fa-sync-alt"></i> <?= $this->lang->line('button_change'); ?></button>
          </div>
        </form>
      </div>
    </div>

    <div id="personalinfo" uk-modal="bg-close: false">
      <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
          <h2 class="uk-modal-title uk-text-uppercase"><i class="far fa-user"></i> <?= $this->lang->line('button_add_personal_info'); ?></h2>
        </div>
        <form action="" method="post" accept-charset="utf-8">
          <div class="uk-modal-body">
            <div class="uk-margin uk-light">
              <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_username'); ?> & <?= $this->lang->line('form_email'); ?></label>
              <div class="uk-form-controls">
                <div class="uk-inline uk-width-1-1">
                  <span class="uk-form-icon"><i class="fas fa-user fa-lg"></i></span>
                  <input class="uk-input uk-width-1-1" type="text" placeholder="<?= $this->session->userdata('fx_sess_username'); ?>" disabled>
                </div>
              </div>
            </div>
            <div class="uk-margin uk-light">
              <div class="uk-form-controls">
                <div class="uk-inline uk-width-1-1">
                  <span class="uk-form-icon"><i class="fas fa-envelope fa-lg"></i></span>
                  <input class="uk-input" type="text" placeholder="<?= $this->session->userdata('fx_sess_email'); ?>" disabled>
                </div>
              </div>
            </div>
            <hr class="uk-divider-icon">
            <div class="uk-margin uk-light">
              <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_user_info'); ?></label>
              <div class="uk-form-controls">
                <select class="uk-select" name="country_us">
                  <?php foreach($this->user_model->getCountry()->result() as $country_us): ?>
                  <option value="<?= $country_us->id; ?>"><?= $country_us->country_name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
          <div class="uk-modal-footer uk-text-right actions">
            <button class="uk-button uk-button-danger uk-modal-close" type="button"><i class="fas fa-times-circle"></i> <?= $this->lang->line('button_cancel'); ?></button>
            <button class="uk-button uk-button-default" type="submit" name="button_uppdateinfo"><i class="fas fa-sync-alt"></i> <?= $this->lang->line('button_change'); ?></button>
          </div>
        </form>
      </div>
    </div>