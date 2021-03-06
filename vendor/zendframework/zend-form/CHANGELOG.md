# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## 2.8.1 - 2016-04-18

### Added

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- [#59](https://github.com/zendframework/zend-form/pull/59) fixes the
  `Module::init()` method to properly receive a `ModuleManager` instance, and
  not expect a `ModuleEvent`.

## 2.8.0 - 2016-04-07

### Added

- [#53](https://github.com/zendframework/zend-form/pull/53) adds
  `Zend\Form\FormElementManagerFactory`, for creating and returning instances of
  `Zend\Form\FormElementManager`. This factory was ported from zend-mvc, and
  will replace it for version 3 of that component.
- [#53](https://github.com/zendframework/zend-form/pull/53) adds
  `Zend\Form\Annotation\AnnotationBuilderFactory`, for creating and returning
  instances of `Zend\Form\Annotation\AnnotationBuilder`. This factory was ported
  from zend-mvc, and will replace it for version 3 of that component.
- [#53](https://github.com/zendframework/zend-form/pull/53) exposes the package
  as a config-provider and ZF component, by adding:
  - `ConfigProvider`, which maps the `FormElementsManager` and
    `FormAnnotationBuilder` servies previously provided by zend-mvc; the form
    abstract factory as previously registered by zend-mvc; and all view helper
    configuration.
  - `Module`, which maps services and view helpers per the `ConfigProvider`, and
    provides configuration to the zend-modulemanager `ServiceLocator` in order
    for modules to provide form and form element configuration.

### Deprecated

- [#53](https://github.com/zendframework/zend-form/pull/53) deprecates
  `Zend\Form\View\HelperConfig`; the functionality is made obsolete by
  `ConfigProvider`. It now consumes the latter in order to provide view helper
  configuration.

### Removed

- Nothing.

### Fixed

- Nothing.

## 2.7.1 - 2016-04-07

### Added

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- [#24](https://github.com/zendframework/zend-form/pull/24) ensures that when
  `Zend\Form\Form::getInputFilter()` when lazy-creates an `InputFilter`
  instance, it is populated with the `InputFilterFactory` present in its own
  `FormFactory`. This ensures that any custom inputs, input filters, validators,
  or filters are available to the new instance.
- [#38](https://github.com/zendframework/zend-form/pull/38) removes the
  arbitrary restriction of only the "labelledby" and "describedby" aria
  attributes on form element view helpers; any aria attribute is now allowed.
- [#45](https://github.com/zendframework/zend-form/pull/45) fixes the behavior
  in `Zend\Form\Factory::create()` when pulling elements from the form element
  manager; it now will pass specifications provided for the given element when
  calling the manager's `get()` method.

## 2.7.0 - 2016-02-22

### Added

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- [#40](https://github.com/zendframework/zend-form/pull/40) and
  [#43](https://github.com/zendframework/zend-form/pull/43) prepare the
  component to be forwards compatible with each of the following:
  - zend-eventmanager v3
  - zend-hydrator v2.1
  - zend-servicemanager v3
  - zend-stdlib v3
- [#14](https://github.com/zendframework/zend-form/pull/14) ensures that
  collections can remove all elements when populating values.

## 2.6.0 - 2015-09-22

### Added

- [#17](https://github.com/zendframework/zend-form/pull/17) updates the component
  to use zend-hydrator for hydrator functionality; this provides forward
  compatibility with zend-hydrator, and backwards compatibility with
  hydrators from older versions of zend-stdlib.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 2.5.3 - 2015-09-22

### Added

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- [#16](https://github.com/zendframework/zend-form/pull/16) updates the
  zend-stdlib dependency to reference `>=2.5.0,<2.7.0` to ensure hydrators
  will work as expected following extraction of hydrators to the zend-hydrator
  repository.

## 2.5.2 - 2015-09-09

### Added

- Nothing.

### Deprecated

- [#12](https://github.com/zendframework/zend-form/pull/12) deprecates the
  `AllowEmpty` and `ContinueIfEmpty` annotations, to mirror changes made in
  [zend-inputfilter#26](https://github.com/zendframework/zend-inputfilter/pull/26).

### Removed

- Nothing.

### Fixed

- [#1](https://github.com/zendframework/zend-form/pull/1) `AbstractHelper` was
  being utilized on the method signature vs. `HelperInterface`.
- [#9](https://github.com/zendframework/zend-form/pull/9) fixes typos in two
  `aria` attribute names in the `AbstractHelper`.
