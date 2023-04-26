
    <?php
      // Get the form data
      $username = "reewaz";
      $oldpassword = $_POST['oldpassword'];
      $newpassword = $_POST['newpassword'];
      $confirmpassword = $_POST['confirmpassword'];

      // Check if the new password and confirm password match
      if($newpassword !== $confirmpassword) {
          echo "Error: New password and confirm password do not match.";
      } else {
          // Use the exec function to run the passwd command
          $command = "echo '$newpassword\n$newpassword' | passwd --stdin $username";
          shell_exec("echo '$oldpassword' | sudo -S $command 2>&1", $output, $return_var);

          // Check the return status and display a message accordingly
          if($return_var === 0) {
              echo "Password changed successfully.";
          } else {
              echo "Error: " . implode("\n", $output);
          }
      }