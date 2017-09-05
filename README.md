# CnetConnector

CNET is the world's leader in tech product reviews, news, videos and more on technology and consumer electronics.

This extension allows to enrich your products data from CNET data provider. Data structure and products data are imported through the CNET connector using native Akeneo PIM CSV files format.


## Requirements

| CNET Connector   | Akeneo PIM Community Edition |
|:----------------:|:----------------------------:|
| v1.1             | v1.7.*                       |
| v1.0             | v1.6.*                       |

CNET connector has dependency on the https://github.com/akeneo-labs/CustomEntityBundle and https://github.com/akeneo/ExtendedAttributeTypeBundle.
Please follow also the install documentation of these bundles.


## Installation
You can install this bundle with composer (see requirements section):

```bash
    php composer require akeneo/cnet-connector:1.1.*
```
Then you should configure CustomEntityBundle adding its routing and registering the bundle (See https://github.com/akeneo-labs/CustomEntityBundle#installation)

Enable the CnetConnectorBundle in the `app/AppKernel.php` file in the `registerBundles()` method:

```php
    $bundles = [
        // ...
        new Pim\Bundle\CustomEntityBundle\PimCustomEntityBundle(),
        new Pim\Bundle\ExtendedAttributeTypeBundle\PimExtendedAttributeTypeBundle(),
        new Pim\Bundle\CnetConnectorBundle\PimCnetConnectorBundle(),
        new Acme\Bundle\AppBundle\AcmeAppBundle(), // Integration bundle
    ]
```

If you are using the Akeneo PIM Enterprise Edition, please use `Acme\Bundle\AppEEBundle\AcmeAppEEBundle`.
Create a symbolic link of the Acme bundle you need from your `src` directory.

```bash
    ln -s ../vendor/akeneo/cnet-connector/docs/example/Acme Acme    
```

Add the Brand reference data in your `app/config/config.yml` file and override the `ProductValue` entity:

```yml
pim_reference_data:
    brand:
        class: Pim\Bundle\CnetConnectorBundle\Entity\Brand
        type: simple

akeneo_storage_utils:
    mapping_overrides:
        -
            original: Pim\Component\Catalog\Model\ProductValue
            override: Acme\Bundle\AppBundle\Model\ProductValue
```

Please, notice that if you are using the Enterprise Edition, you have to override the `PimEnterprise\Component\Catalog\Model\ProductValue` and do the same for `PimEnterprise\Component\Workflow\Model\PublishedProductValue`


## Documentation

`AcmeAppBundle` and `AcmeAppEEBundle` are example bundles. Feel free to use your own one for production environment if you need to customize it.
