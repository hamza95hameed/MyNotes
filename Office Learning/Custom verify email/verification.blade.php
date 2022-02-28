{{-- <!DOCTYPE html>
<html>
<head>
    <title>Clever Cost</title>
</head>
<body>

<p>Thank you for signing up for Clever Cost.</p> 
<p>Please click the button below to verify your email address.</p>
{{-- <h3>Verification Code : {{ $data['code']}}</h3> --}}
{{-- <a href="{{ $data['code']}}">Verify Your Email</a>

<p>If you have any questions or feedback regarding Clever Cost, please don't hesitate to contact us.</p> --}}


{{-- </body>
</html> --}} 



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Clever Cost</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <style type="text/css">
    a[x-apple-data-detectors] {color: inherit !important;}
  </style>

</head>
<body style="margin: 0; padding: 0;">
  <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td style="padding: 20px 0 30px 0;">

<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
  <tr>
    <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
      {{-- <img src="{{asset('assets/web/images/logo.svg')}}" alt="Creating Email Magic." width="300" height="230" style="display: block;" /> --}}
    <h1>Clever Cost</h1>
    </td>
  </tr>
  <tr>
    <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
      <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <tr>
          <td style="color: #153643; font-family: Arial, sans-serif;">
            <h4 style="font-size: 24px; margin: 0;">Thank you for signing up for Clever Cost. 
Please click the button below to verify your email address.</h4>
          </td>
        </tr>
        <tr>
          <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">
           <button>
           <a href="{{ $data['code']}}">
           Verify Your Email
           </a>
           </button>
          </td>
        </tr>

        <tr>
          <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">
            <h4 style="margin: 0;">If you have any questions or feedback regarding Clever Cost, please don't hesitate to contact us
            </h4>
          </td>
        </tr>
       
      </table>
    </td>
  </tr>
  <tr>
    <td bgcolor="#ee4c50" style="padding: 30px 30px;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <tr>
          <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;">
            <p style="margin: 0;">&reg;This email was sent to [insert user email address]. If you don't want to receive these kind of emails from Clever Cost in the future you can unsubscribe from our mailing list.<br/>
        
          </td>
      
        </tr>
      </table>
    </td>
  </tr>
</table>

      </td>
    </tr>
  </table>
</body>
</html>