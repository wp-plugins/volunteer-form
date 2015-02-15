

  <form class="form-horizontal" role="form" action="<?php esc_url($_SERVER['REQUEST_URI']) ?>" method="POST">

      <div class="vf-group-header"><h3>Your details</h3></div>

      <div class="form-group ">
        <label for="inputEmail3" class="col-sm-2 form-label">First Name</label>
        <div class="col-sm-4">
          <input type="text" maxlength="32" name="firstname" class="form-control">
        </div>
        <label for="inputEmail3" class="col-sm-2 form-label">Last Name</label>
        <div class="col-sm-4">
          <input type="text" maxlength="32" name="surname" class="form-control">
        </div>
      </div>

      <div class="form-group ">
        <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
        <div class="col-sm-10">
          <input type="text" maxlength="32" name="address1" class="form-control">
        </div>
      </div>

      <div class="form-group ">
        <div class="col-sm-2"> &nbsp; </div>
        <div class="col-sm-10">
          <input type="text" maxlength="32" name="address2" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Suburb</label>
        <div class="col-sm-6">
          <input type="text" maxlength="20" name="suburb" class="form-control">
        </div>

        <label for="inputEmail3" class="col-sm-2 control-label">Postcode</label>
        <div class="col-sm-2">
          <input type="text" maxlength="4" name="postcode" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Branch</label>
        <div class="col-sm-4">
          <input type="text" maxlength="32" name="branch" class="form-control">
        </div>
        <label for="inputEmail3" class="col-sm-2 form-label">Email</label>
        <div class="col-sm-4">
          <input type="email" maxlength="32" name="email" class="form-control">
        </div>
      </div>

      <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Phone (h)</label>
          <div class="col-sm-2">
            <input type="text" maxlength="32" name="phone_h" class="form-control">
          </div>
          <label for="inputEmail3" class="col-sm-1 control-label">(w)</label>
          <div class="col-sm-3">
            <input type="text" maxlength="32" name="phone_w" class="form-control">
          </div>
          <label for="inputEmail3" class="col-sm-1 control-label">(m)</label>
          <div class="col-sm-3">
            <input type="text" maxlength="32" name="phone_m" class="form-control">
          </div>
      </div>

       <div class="vf-group-header"><h3 class="vf-head">How you can assist</h3></div>

      <div class="form-group">
        <div class="row">
          <div class="col-sm-4">
            <label class="radio-inline">
              <input type="checkbox" name="assist[]" value="canvasing"> Phone canvassing
            </label>
          </div>
          <div class="col-sm-4">
            <label class="radio-inline">
              <input type="checkbox" name="assist[]" value="door knocking"> Door knocking
            </label>
          </div>
          <div class="col-sm-4">
            <label class="radio-inline">
              <input type="checkbox" name="assist[]" value="street stalls"> Street stalls
            </label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-sm-4">
            <label class="radio-inline">
              <input type="checkbox" name="assist[]" value="letterboxing"> Letterboxing
            </label>
          </div>
          <div class="col-sm-4">
            <label class="radio-inline">
              <input type="checkbox" name="assist[]" value="sign"> Sign Site
            </label>
          </div>
          <div class="col-sm-4">
            <label class="radio-inline">
              <input type="checkbox" name="assist[]" value="radio"> Talkback Radio
            </label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-sm-4">
            <label class="radio-inline">
              <input type="checkbox" name="assist[]" value="letters editor"> Letters to Editor
            </label>
          </div>
          <div class="col-sm-4">
            <label class="radio-inline">
              <input type="checkbox" name="assist[]" value="office"> Staffing campaign office
            </label>
          </div>
          <div class="col-sm-4">
            <label class="radio-inline">
              <input type="checkbox" name="assist[]" value="commuter"> Commuter hub campaigning
            </label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-sm-4">
            <label class="radio-inline">
              <input type="checkbox" name="assist[]" value="polling day"> Polling day
            </label>
          </div>
          <div class="col-sm-8">
            <label class="radio-inline">
              Other:
              <input type="text" name="assist_other" value="">
            </label>
          </div>
        </div>
      </div>

      <div class="vf-group-header"><h3 class="vf-head">Times available, please check</h3></div>

    <div class="form-group">
        <label class="col-sm-2">
          Mon
        </label>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_mon[]"  value="6am"> 6-9am
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_mon[]" value="9am"> 9am-12pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_mon[]" value="12pm"> 12-3pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_mon[]" value="3pm"> 3-6pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_mon[]" value="6pm"> 6-9pm
          </label>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">
          Tue
        </label>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_tue[]"  value="6am"> 6-9am
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_tue[]" value="9am"> 9am-12pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_tue[]" value="12pm"> 12-3pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_tue[]" value="3pm"> 3-6pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_tue[]" value="6pm"> 6-9pm
          </label>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">
          Wed
        </label>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_wed[]"  value="6am"> 6-9am
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_wed[]" value="9am"> 9am-12pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_wed[]" value="12pm"> 12-3pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_wed[]" value="3pm"> 3-6pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_wed[]" value="6pm"> 6-9pm
          </label>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">
          Thu
        </label>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_thu[]"  value="6am"> 6-9am
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_thu[]" value="9am"> 9am-12pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_thu[]" value="12pm"> 12-3pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_thu[]" value="3pm"> 3-6pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_thu[]" value="6pm"> 6-9pm
          </label>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">
          Fri
        </label>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_fri[]"  value="6am"> 6-9am
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_fri[]" value="9am"> 9am-12pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_fri[]" value="12pm"> 12-3pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_fri[]" value="3pm"> 3-6pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_fri[]" value="6pm"> 6-9pm
          </label>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">
          Sat
        </label>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_sat[]"  value="6am"> 6-9am
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_sat[]" value="9am"> 9am-12pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_sat[]" value="12pm"> 12-3pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_sat[]" value="3pm"> 3-6pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_sat[]" value="6pm"> 6-9pm
          </label>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">
          Sun
        </label>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_sun[]"  value="6am"> 6-9am
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_sun[]" value="9am"> 9am-12pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_sun[]" value="12pm"> 12-3pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_sun[]" value="3pm"> 3-6pm
          </label>
        </div>
        <div class="col-sm-2">
          <label class="radio-inline">
            <input type="checkbox" name="time_sun[]" value="6pm"> 6-9pm
          </label>
        </div>
    </div>


<!--     <div class="form-group">
      <div class="vf-form-label" style="border: 1px solid red">
        test
      </div>
      <div class="col-sm-4">
        test
      </div>
      <div class="col-sm-4">
        test
      </div>
    </div> -->

    <div class="form-group">
      <div class="col-sm-offset-2 vf-form-field">
        <input type="submit" name="vf-form-submit" class="btn btn-default" value="Submit">
      </div>
    </div>
  </form>
