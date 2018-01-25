# CnetConnector

CNET is the world's leader in tech product reviews, news, videos and more on technology and consumer electronics.

This extension allows to enrich your products data from CNET data provider. Data structure and products data are imported through the CNET connector using native Akeneo PIM CSV files format.


## Requirements

| CNET Connector   | Akeneo PIM Community Edition |
|:----------------:|:----------------------------:|
| v2.0             | v2.*                         |
| v1.1             | v1.7.*                       |
| v1.0             | v1.6.*                       |


## Installation
You can install this bundle with composer (see requirements section):

```bash
    php composer require akeneo/cnet-connector:2.0.*
```

CNET connector has a dependency on the [CustomEntityBundle](https://github.com/akeneo-labs/CustomEntityBundle) and the [ExtendedAttributeTypeBundle](https://github.com/akeneo/ExtendedAttributeTypeBundle).
Be sure to follow the install documentation of these bundles prior to the following steps.

Enable the CnetConnectorBundle in the `app/AppKernel.php` file in the `registerBundles()` method:

```php
    $bundles = [
        // ...
        new Pim\Bundle\CustomEntityBundle\PimCustomEntityBundle(),
        new Pim\Bundle\ExtendedAttributeTypeBundle\PimExtendedAttributeTypeBundle(),
        new Pim\Bundle\CnetConnectorBundle\PimCnetConnectorBundle(),
    ]
```

Add the Brand reference data in your `app/config/config.yml` file:

```yml
pim_reference_data:
    brand:
        class: Pim\Bundle\CnetConnectorBundle\Entity\Brand
        type: simple
```

From an existing PIM instance, you will have to update your database schema and regenerate your front assets:
```bash
    php bin/console cache:clear --env=prod --no-warmup
    php bin/console doctrine:schema:update --env=prod --force
    php bin/console --env=prod pim:installer:assets --symlink --clean
    yarn run webpack
```

Otherwise, you can proceed with the PIM's normal install process.
