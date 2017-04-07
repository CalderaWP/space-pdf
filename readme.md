This is the source code for the [Caldera Forms PDF app](https://caldera.space) app. If you are looking for the WordPress plugin, you can find it at [https://wordpress.org/plugins/caldera-forms-pdf/](https://wordpress.org/plugins/caldera-forms-pdf/)

* This is free software, feel free to use it but no support or warranty is offered. if you would like to hire us to help set it up for you, please [contact us](https://calderaforms.com/contact)

* Copyright 2016 CalderaWP LLC, licensed under the term of the GNU GPL v2

### Use With Client Plugin
The client plugin has [a filter](https://github.com/CalderaWP/cf-pdf/blob/master/classes/client.php#L129) so that can change the API url. If you deploy this app at https://you.com then you would filter the API URL like this:

```
  add_filter( 'cf_pdf_pdf_url', function(){
    return 'https://you.com/api/pdf';
  });
```
