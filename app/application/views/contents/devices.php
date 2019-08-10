<main class="mdl-layout__content">

  <div class="mdl-cell mdl-cell--7-col-desktop mdl-cell--7-col-tablet mdl-cell--4-col-phone">
    <div class="mdl-card mdl-shadow--2dp">
      <div class="mdl-card__title">
        <h5 class="mdl-card__title-text text-color--white">Add New Device</h5>
      </div>
      <div class="mdl-card__supporting-text">
        <form class="" action="<?php echo base_url('devices/add') ?>" method="POST">
          <div class="mdl-grid">


            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone form__article">
              <h3 class="text-color--smooth-gray">Input device info</h3>
              <div class="mdl-textfield mdl-js-textfield full-size">
                <input name="device_alias" class="mdl-textfield__input" type="text" id="first-name">
                <label class="mdl-textfield__label" for="first-name">Device alias</label>
              </div>
              <div class="mdl-textfield mdl-js-textfield full-size">
                <input name="device_serial_number" class="mdl-textfield__input" type="text" id="last-name">
                <label class="mdl-textfield__label" for="last-name">Serial Number</label>
              </div>
              <br><br>
              <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal pull-right" data-upgraded=",MaterialButton,MaterialRipple">
                <i class="material-icons">add</i>
                Add
                <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(67px, 18px);"></span></span></button>
              </div>


            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--8-col-tablet mdl-cell--8-col-phone">
        <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h1 class="mdl-card__title-text">Devices</h1>
            </div>
            <div class="mdl-card__supporting-text no-padding">
                <table class="mdl-data-table mdl-js-data-table stripped-table" style="width:100%;" >
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Alias</th>
                        <th class="mdl-data-table__cell--non-numeric">Date</th>
                        <th class="mdl-data-table__cell--non-numeric">SN</th>
                        <th class="mdl-data-table__cell--non-numeric">Delete</th>

                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($devices as $device): ?>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric"><?php echo $device['device_alias'] ?></td>
                            <td style="text-align:center" class="mdl-data-table__cell--non-numeric"><?php echo $device['device_date'] ?></td>
                            <td style="text-align:center" class="mdl-data-table__cell--non-numeric"><?php echo $device['device_sn'] ?></td>
                            <td style="text-align:center" class="mdl-data-table__cell--non-numeric"><span class="label label--mini color--red">Delete</span> </td>
                        </tr>

                      <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

  </main>
