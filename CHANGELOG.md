# Changelog

## [6.0.1](https://github.com/devuri/brisko/compare/6.0.0...6.0.1) (2025-02-25)


### Bug Fixes

* adds `brisko_site_blocks_open` will remove top margin in classic ([0ba5660](https://github.com/devuri/brisko/commit/0ba5660647f23c7139f8e79dad50ee10942991a7))
* updated layout wideSize ([a99b41b](https://github.com/devuri/brisko/commit/a99b41bb45191a4eb12452e9a436181cb5204baa))


### Miscellaneous Chores

* v6.0.1 ([bc5f5b2](https://github.com/devuri/brisko/commit/bc5f5b2732b109293a078f6a181eaa16a683d52d))

## [6.0.0](https://github.com/devuri/brisko/compare/5.0.0...6.0.0) (2025-02-24)


### ⚠ BREAKING CHANGES

* adds support for styles and block `editor`
* remove `bootstrap` only retains `grid`
* adds `core` css
* adds `theme.json`
* new improved `main Options` handler

### Features

* add `Enable Block Header` and `Enable Block Footer` ([1cfeb3a](https://github.com/devuri/brisko/commit/1cfeb3ad2778f677952e91dd795df44c74ef226b))
* add `Enqueue Extra assets`  ([aecb35b](https://github.com/devuri/brisko/commit/aecb35b9df658de1c3ad46e2ccc39263b63ece29))
* adds `brisko_customizer_setting` action hook ([d6d76d7](https://github.com/devuri/brisko/commit/d6d76d7d39eea39d066e1d6b37c9cce44a39765d))
* adds `core` css ([b610182](https://github.com/devuri/brisko/commit/b6101822202d4c8acc81426df768dcd28db05baf))
* adds `disable_wpautop` Removes extra &lt;p&gt; tags in post and pages ([3839a6c](https://github.com/devuri/brisko/commit/3839a6cee208573cf3d2d623c89113a04b385550))
* adds `theme.json` ([1f5b73e](https://github.com/devuri/brisko/commit/1f5b73e38163095ee55f9e06ed25402a1878476d))
* adds `use_block_templates` to switch to block theme mode ([2f6f95b](https://github.com/devuri/brisko/commit/2f6f95b05e630d2d05bcfb3cb2fb9062166e304e))
* adds entry meta hook `brisko_entry_meta` ([5f4694d](https://github.com/devuri/brisko/commit/5f4694d913590e662e757eb6e2d6e22ac889220e))
* adds new hook `brisko_after_body_open` ([e11e594](https://github.com/devuri/brisko/commit/e11e5944c9a2642bdd9a000e78ca50eaf712e01c))
* adds standalone autoloader `Autoloader` class ([2a8b991](https://github.com/devuri/brisko/commit/2a8b9912ac481adc854f3b00e6872c533dcbbc4d))
* adds support for styles and block `editor` ([a582309](https://github.com/devuri/brisko/commit/a582309b12374c25c7adc779a5db91b5c5c8cf57))
* better starter `front-page` for FSE mode ([830206f](https://github.com/devuri/brisko/commit/830206fa03d020a5415fe1d0e1e851b8f399c5de))
* new improved `main Options` handler ([51644d6](https://github.com/devuri/brisko/commit/51644d6ba4ed5aa853e8da07b1740238146fe5f1))
* update `post detail` options ([f328b4d](https://github.com/devuri/brisko/commit/f328b4df6f7eb610cd365eee04f8bd468f477990))
* updated `brisko_assets` now files can be in `brisko_assets/css` ([248f621](https://github.com/devuri/brisko/commit/248f6210f1c1d7cfefacc35795037ebe6f7fd754))


### Bug Fixes

* add `zipit` ([33abcf8](https://github.com/devuri/brisko/commit/33abcf8e1f69109a034b8f4dd071182ff7008c48))
* add more `FSE` support ([b2beef4](https://github.com/devuri/brisko/commit/b2beef43b669d3174a11ac2ea0984076d6eac2ee))
* add setting to disable `custom-styles` ([9cb65e3](https://github.com/devuri/brisko/commit/9cb65e375648b7c3e2d7c8cf1b85ac4d950e3259))
* add theme local fonts ([078207f](https://github.com/devuri/brisko/commit/078207f7783382f08d6d88a90d23c99e1ad2114f))
* alignfull update ([94169b3](https://github.com/devuri/brisko/commit/94169b39b6932bbe4a8e673938fc6c497838d696))
* author name ([d042e62](https://github.com/devuri/brisko/commit/d042e628ce31d1bf3b954a5bd250d18094cb380d))
* classic theme mode `js` will not be loaded in `FSE` mode ([416e251](https://github.com/devuri/brisko/commit/416e251c0d910de78983c63d687383fd2064d2c2))
* fix text domain ([eef4a6b](https://github.com/devuri/brisko/commit/eef4a6b4b1d64a47f716a6c9eefe7b2eb9ac23f5))
* fixes editor styles ([4835fc6](https://github.com/devuri/brisko/commit/4835fc6849172e73ca4e2ceb2867991213b5312a))
* fixes theme mod getter ([9921977](https://github.com/devuri/brisko/commit/9921977f87e80e8f6858b457aee25a4930e2f572))
* info for when  `use_block_templates` ([cf3a7d1](https://github.com/devuri/brisko/commit/cf3a7d1b11d2466c66c54a4600d918a6a78459f8))
* main Navigation compatible with bootstrap ([271fd63](https://github.com/devuri/brisko/commit/271fd6361077eecc1c4f97873b1e2d32d958f3ed))
* new better .alignwide, .alignfull support ([e008b77](https://github.com/devuri/brisko/commit/e008b771e7331583e92dd58be0230f0f90720df6))
* refactor customizer ([699565d](https://github.com/devuri/brisko/commit/699565d0f69d4f1eab60a60f38ef4c265baae6a8))
* register with init ([b343e4d](https://github.com/devuri/brisko/commit/b343e4df821d81826890efc7037ad7972a50b233))
* remove `bootstrap` only retains `grid` ([90a9227](https://github.com/devuri/brisko/commit/90a92271f83a8ca16225adf85605ec4b959dbcfb))
* remove edit link ([feb13e4](https://github.com/devuri/brisko/commit/feb13e4eec9208faf9c53607bbcaa48ae39ce3ba))
* update alignwide to fix scroll bar at the bottom ([8c39a19](https://github.com/devuri/brisko/commit/8c39a1982a6ee91e047fd9ddac15aa7f70c73e16))
* update init in `setup()` ([334f5a4](https://github.com/devuri/brisko/commit/334f5a4bfac50ef2c9412f5d3063eb145d5006ca))


### Miscellaneous Chores

* build ([63ce89d](https://github.com/devuri/brisko/commit/63ce89dcb49a618cc190064a699ab70656b96734))
* build ([0154ec0](https://github.com/devuri/brisko/commit/0154ec089b75e13dc0dfc89964ccb6dfff6b47cb))
* build ([77012b6](https://github.com/devuri/brisko/commit/77012b6246a266c977494f391c9dfcf86fbf2410))
* build ([b9c8bac](https://github.com/devuri/brisko/commit/b9c8bac41ae136043ad59106177eccc213793dc4))
* build ([c9615cd](https://github.com/devuri/brisko/commit/c9615cd85096e304ca9a0fdf9d0021f0ff9c6930))
* build ([02b5187](https://github.com/devuri/brisko/commit/02b51877620ef3762fbb22c44b8700f11a54829f))
* build ([fdf9c58](https://github.com/devuri/brisko/commit/fdf9c582aa2186d0a2794f46c6c28764e92a02f6))
* build ([e44289a](https://github.com/devuri/brisko/commit/e44289af1109017be2a5cc96b910cedffbc1ce19))
* build ([505b9c3](https://github.com/devuri/brisko/commit/505b9c3ed0142b88b09824db38d4dcf8316b000e))
* build ([7bd1a76](https://github.com/devuri/brisko/commit/7bd1a76117ce1beb61c6da29c3b1753e6b8d5f99))
* build ([1795b52](https://github.com/devuri/brisko/commit/1795b52bcc2ed5ea78560b4a153fb66248c030b4))
* build ([ace3e7e](https://github.com/devuri/brisko/commit/ace3e7e74b10b44de0730c6524f123e512d21804))
* build docs ([19c19fc](https://github.com/devuri/brisko/commit/19c19fcd6f16b3935d2b038359e52e5ecdac19ba))
* codefix6.0 ([14b523f](https://github.com/devuri/brisko/commit/14b523f8294f208d40f268440623690bc96eab8a))
* css improvements ([5b73e04](https://github.com/devuri/brisko/commit/5b73e043327cdb6d96939968547bee0419ae0753))
* docs ([06f21a2](https://github.com/devuri/brisko/commit/06f21a2be1129045f1c56801a6dc8c52a947c8ca))
* vbump `5.1.0` ([1c2b121](https://github.com/devuri/brisko/commit/1c2b12118aba733c4fb3241f95b2aa072defbb98))
* version bump 6.0.0 ([b9e2b44](https://github.com/devuri/brisko/commit/b9e2b44635c21a2311dbceee6fc26a12a51cfd20))

## [5.0.0](https://github.com/devuri/brisko/compare/4.0.1...5.0.0) (2023-09-03)


### ⚠ BREAKING CHANGES

* upgrade to php7.0

### Features

* adds normalize.css ([10127e4](https://github.com/devuri/brisko/commit/10127e4f68b14519549e2c14c16ffbc022a59100))
* upgrade to php7.0 ([fcf36f1](https://github.com/devuri/brisko/commit/fcf36f1323b89cae2d514cd3fa659f1c055dc5b8))
* v5.0.1 version bump ([5108c10](https://github.com/devuri/brisko/commit/5108c10ee6db57f84738db6fc8938f12153fee4b))


### Bug Fixes

* Determine whether to load theme modifications by default. ([6311ffc](https://github.com/devuri/brisko/commit/6311ffc07ad050a4f606f690c4cbd49fa6c0df7b))


### Miscellaneous Chores

* codefix ([216b193](https://github.com/devuri/brisko/commit/216b193458dd00c8c93127a1bfd04f8d3be86884))
* fix version v5.0.0 ([c95ab35](https://github.com/devuri/brisko/commit/c95ab358412112041279d97d4e8b6840938a2804))

## [4.0.1](https://github.com/devuri/brisko/compare/4.0.0...4.0.1) (2023-07-23)


### Bug Fixes

* remove `width:  100vw` it causes overflow in the browser ([9e190b7](https://github.com/devuri/brisko/commit/9e190b75688a66a9bdc78b466dddb4bdb886b71a))


### Miscellaneous Chores

* version bump 4.0.1 ([44c2ce6](https://github.com/devuri/brisko/commit/44c2ce63cc60dd8990f4984a788d1bb57869da39))

## [4.0.0](https://github.com/devuri/brisko/compare/3.8.0...4.0.0) (2023-07-23)


### ⚠ BREAKING CHANGES

* version bump 4.0

### Features

* add `Max Width` to Layout section, and remove `site-main` padding ([a0ec44c](https://github.com/devuri/brisko/commit/a0ec44c9a94dfb9343219e4fbeeab8a59277ff16))
* version bump 4.0 ([1831129](https://github.com/devuri/brisko/commit/1831129ff376e0ccde114c2751f9ef57d177f8e8))


### Bug Fixes

* adds easy access helpers ([26d2523](https://github.com/devuri/brisko/commit/26d25239d1bb5fb89d7d8fbf006e4813d02fe3bd))
* fixes `Brisko Full Width` ([abbd837](https://github.com/devuri/brisko/commit/abbd837793af5f2632abe68345cd88900668ed88))
* update removes the `views` dir items use theme files ([dfb1b9e](https://github.com/devuri/brisko/commit/dfb1b9effd2ac574436b5558c20664c7a42b1106))


### Miscellaneous Chores

* **version:** 4.0 ([f3a7e5f](https://github.com/devuri/brisko/commit/f3a7e5f8c642a2fbc4e7c8309974e535404aa47a))

## [3.8.0](https://github.com/devuri/brisko/compare/v3.7.0...3.8.0) (2023-05-25)


### Features

* Build 3.7.4 ([a1493bb](https://github.com/devuri/brisko/commit/a1493bb59ce52949bbc64b65259e92044d387cb3))
