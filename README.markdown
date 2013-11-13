# PHP Mailer Class

#### Author

* Miquel Camps Orteza
* [@miquelcamps](https://twitter.com/miquelcamps)

#### Initialize

```php
require 'mailer.php';

$sender = 'mailjet';
$mailer = new Mailer($sender);
$mailer->subject = 'Your subject here';
$mailer->from = 'noreply@domain.com';
$mailer->reply_to = 'replyto@domain.com';
$mailer->name = 'Your company';
$mailer->to = 'client@domain.com';
$mailer->body = 'HTML content here';
$mailer->send();
```