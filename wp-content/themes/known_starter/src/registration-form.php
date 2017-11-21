<?php
$result = $_GET['result'];
$login = $_GET['login'];
$loginURL = add_query_arg('login', 'true');
$loginURL = esc_url($loginURL);
$registerURL = add_query_arg(array('login' => false, 'result' => false));
$registerURL = esc_url($registerURL);

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$company = $_POST['company'];
$message = $_POST['message'];

$validationErrors = [];

function registration_validation($fname, $lname, $email, $company, $message) {
  global $reg_errors;
  global $validationErrors;
  $reg_errors = new WP_Error;

  if(empty($fname) || empty($lname) || empty($email) || empty($company)) {
    $reg_errors->add('field', 'Please fill out all fields.');
  }

  if(email_exists($email)) {
    $reg_errors->add('email', 'This email is already in use');
  }

  if(is_wp_error($reg_errors)) {
    foreach($reg_errors->get_error_messages() as $error) {
      array_push($validationErrors, $error);
    }
  }
}

function complete_registration() {
  global $reg_errors, $fname, $lname, $email, $company, $message;
  if(1 > count($reg_errors->get_error_messages())) {
    $userdata = array(
      'user_login' => $email,
      'first_name' => $fname,
      'last_name' => $lname,
      'user_email' => $email,
      'company' => $company,
      'message' => $message
    );
    $user = wp_insert_user($userdata);
    echo 'User added';
  }
}

function custom_registration_function() {
  if(isset($_POST['submit'])) {
    registration_validation(
      $_POST['fname'],
      $_POST['lname'],
      $_POST['email'],
      $_POST['company'],
      $_POST['message']
    );

    // sanitize user input
    global $fname, $lname, $email, $company, $message;
    $fname = sanitize_text_field($_POST['fname']);
    $lname = sanitize_text_field($_POST['lname']);
    $email = sanitize_email($_POST['email']);
    $company = sanitize_text_field($_POST['company']);
    $message = esc_textarea($_POST['message']);

    // register user
    complete_registration(
      $fname,
      $lname,
      $email,
      $company,
      $message
    );
  }
}
?>

<div class="registration-form">
  <div class="page-nav-bar">
    <div><a href="<?php echo $registerURL; ?>" <?php if($_GET['login'] !== 'true'){ ?>class="active"<?php } ?> data-action="register">REQUEST ACCESS</a></div>
    <div><a href="<?php echo $loginURL; ?>" <?php if($_GET['login'] === 'true'){ ?>class="active"<?php } ?> data-action="login">LOGIN</a></div>
  </div>

  <?php custom_registration_function(); ?>

  <div class="form-container">
    <?php
    if (!is_user_logged_in())
    {
      if($login === 'true')
      {
        echo '<h3 class="component-header">Enter Your Credentials</h3>';
    		if( $result === 'failed' )
        {
    			echo '<div class="error"><p>Invalid username or password.</p></div>';
    		}
    		$url = get_bloginfo('url') .'/';
    		$args = array(
    			'redirect' => $url,
    			'label_username' => 'Username',
    			'form_id' => 'loginForm',
    			'remember' => false
    		);
        wp_login_form($args);
      } else { ?>
        <h3 class="component-header">Looking forward to hearing from you</h3>
        <?php if($validationErrors) { ?>
          <div class="error">
            <?php foreach($validationErrors as $error) {
              echo $error;
            } ?>
          </div>
        <?php } ?>
        <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post">
          <div class="fields">
            <div class="field half">
              <input type="text" placeholder="First Name" name="fname" value="<?php echo isset($_POST['fname']) ? $fname : null ?>" />
            </div>
            <div class="field half">
              <input type="text" placeholder="Last Name" name="lname" value="<?php echo isset($_POST['lname']) ? $lname : null ?>" />
            </div>
            <div class="field">
              <input type="email" placeholder="Email Address" name="email" value="<?php echo isset($_POST['lname']) ? $email : null ?>" />
            </div>
            <div class="field">
              <input type="text" placeholder="Company Name" name="company" value="<?php echo isset($_POST['lname']) ? $company : null ?>" />
            </div>
            <div class="field">
              <textarea placeholder="Message" name="message"><?php echo isset($_POST['message']) ? $message : null ?></textarea>
            </div>
            <div class="field submit">
              <input class="btn" type="submit" name="submit" value="Submit" />
            </div>
          </div>
        </form>
      <?php
      }
    } else { ?>
      <h3>You are already logged in</h3>
  		<a href="<?php echo wp_logout_url(get_bloginfo('url').'/'); ?>" class="btn"><span>Log out</span></a>
    <?php } ?>
  </div>
</div>
