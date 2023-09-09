<!DOCTYPE html>
<html
  lang="en"
  class=" "
  style="
    --color-primary: 37 50 56;
    --color-secondary: 66 84 92;
    --plyr-color-main: #253238;
  "
>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="msapplication-TileColor" content="#FE006F" />
    <link rel="icon" type="image/x-icon" href="1.avif">

    <style>
      .ui-loader-base {
        font-size: 1rem;
        line-height: 1.5rem;
      }
      .ui-loader-base .ui-loader-icon {
        margin-right: 0.375rem;
        height: 1.25rem;
        width: 1.25rem;
      }
      *,
      :after,
      :before {
        box-sizing: border-box;
        border-width: 0;
        border-style: solid;
        border-color: #e5e7eb;
      }
      :after,
      :before {
        --tw-content: "";
      }
      html {
        line-height: 1.5;
        -webkit-text-size-adjust: 100%;
        -moz-tab-size: 4;
        -o-tab-size: 4;
        tab-size: 4;
        font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
          Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif,
          "Apple Color Emoji", "Segoe UI Emoji", Segoe UI Symbol,
          "Noto Color Emoji";
        font-feature-settings: normal;
      }
      body {
        margin: 0;
        line-height: inherit;
      }
      svg {
        display: block;
        vertical-align: middle;
      }
      :root {
        --color-primary: 255 0 110;
        --color-secondary: 255 190 11;
      }
      *,
      :after,
      :before {
        --tw-border-spacing-x: 0;
        --tw-border-spacing-y: 0;
        --tw-translate-x: 0;
        --tw-translate-y: 0;
        --tw-rotate: 0;
        --tw-skew-x: 0;
        --tw-skew-y: 0;
        --tw-scale-x: 1;
        --tw-scale-y: 1;
        --tw-scroll-snap-strictness: proximity;
        --tw-ring-offset-width: 0px;
        --tw-ring-offset-color: #fff;
        --tw-ring-color: rgb(59 130 246 / 0.5);
        --tw-ring-offset-shadow: 0 0 #0000;
        --tw-ring-shadow: 0 0 #0000;
        --tw-shadow: 0 0 #0000;
        --tw-shadow-colored: 0 0 #0000;
      }
      .mt-6 {
        margin-top: 1.5rem;
      }
      .flex {
        display: flex;
      }
      @keyframes pulse {
        50% {
          opacity: 0.5;
        }
      }
      .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
      }
      @keyframes pulse {
        50% {
          opacity: 0.5;
        }
      }
      @keyframes spin {
        to {
          transform: rotate(360deg);
        }
      }
      .animate-spin {
        animation: spin 1s linear infinite;
      }
      .items-center {
        align-items: center;
      }
      .justify-center {
        justify-content: center;
      }
      .font-sans {
        font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
          Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif,
          "Apple Color Emoji", "Segoe UI Emoji", Segoe UI Symbol,
          "Noto Color Emoji";
      }
      .font-extrabold {
        font-weight: 800;
      }
      .text-brand-primary {
        --tw-text-opacity: 1;
        color: rgb(255 0 110 / var(--tw-text-opacity));
      }
      .text-slate-800 {
        --tw-text-opacity: 1;
        color: rgb(30 41 59 / var(--tw-text-opacity));
      }
      :root {
        --prism-scheme: light;
        --prism-foreground: #6e6e6e;
        --prism-background: #f4f4f4;
        --prism-comment: #a8a8a8;
        --prism-string: #555555;
        --prism-literal: #333333;
        --prism-keyword: #000000;
        --prism-function: #4f4f4f;
        --prism-deleted: #333333;
        --prism-class: #333333;
        --prism-builtin: #757575;
        --prism-property: #333333;
        --prism-namespace: #4f4f4f;
        --prism-punctuation: #ababab;
        --prism-decorator: var(--prism-class);
        --prism-operator: var(--prism-punctuation);
        --prism-number: var(--prism-literal);
        --prism-boolean: var(--prism-literal);
        --prism-variable: var(--prism-literal);
        --prism-constant: var(--prism-literal);
        --prism-symbol: var(--prism-literal);
        --prism-interpolation: var(--prism-literal);
        --prism-selector: var(--prism-keyword);
        --prism-keyword-control: var(--prism-keyword);
        --prism-regex: var(--prism-string);
        --prism-json-property: var(--prism-property);
        --prism-inline-background: var(--prism-background);
        --prism-comment-style: italic;
        --prism-url-decoration: underline;
        --prism-line-number: #a5a5a5;
        --prism-line-number-gutter: #333333;
        --prism-line-highlight-background: #eeeeee;
        --prism-selection-background: #aaaaaa;
        --prism-marker-color: var(--prism-foreground);
        --prism-marker-opacity: 0.4;
        --prism-marker-font-size: 0.8em;
        --prism-font-size: 1em;
        --prism-line-height: 1.5em;
        --prism-font-family: monospace;
        --prism-inline-font-size: var(--prism-font-size);
        --prism-block-font-size: var(--prism-font-size);
        --prism-tab-size: 2;
        --prism-block-padding-x: 1em;
        --prism-block-padding-y: 1em;
        --prism-block-margin-x: 0;
        --prism-block-margin-y: 0.5em;
        --prism-block-radius: 0.3em;
        --prism-inline-padding-x: 0.3em;
        --prism-inline-padding-y: 0.1em;
        --prism-inline-radius: 0.3em;
      }
      #app,
      body,
      html {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #app,
      body,
      html {
        margin: 0;
        height: 100vh;
        padding: 0;
      }
    </style>

    <title>ACV</title>


    <style type="text/css">
      .vfm--fixed[data-v-2836fdb5] {
        position: fixed;
      }
      .vfm--absolute[data-v-2836fdb5] {
        position: absolute;
      }
      .vfm--inset[data-v-2836fdb5] {
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
      }
      .vfm--overlay[data-v-2836fdb5] {
        background-color: rgba(0, 0, 0, 0.5);
      }
      .vfm--prevent-none[data-v-2836fdb5] {
        pointer-events: none;
      }
      .vfm--prevent-auto[data-v-2836fdb5] {
        pointer-events: auto;
      }
      .vfm--outline-none[data-v-2836fdb5]:focus {
        outline: none;
      }
      .vfm-enter-active[data-v-2836fdb5],
      .vfm-leave-active[data-v-2836fdb5] {
        transition: opacity 0.2s;
      }
      .vfm-enter-from[data-v-2836fdb5],
      .vfm-leave-to[data-v-2836fdb5] {
        opacity: 0;
      }
      .vfm--touch-none[data-v-2836fdb5] {
        touch-action: none;
      }
      .vfm--select-none[data-v-2836fdb5] {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      .vfm--resize-tr[data-v-2836fdb5],
      .vfm--resize-br[data-v-2836fdb5],
      .vfm--resize-bl[data-v-2836fdb5],
      .vfm--resize-tl[data-v-2836fdb5] {
        width: 12px;
        height: 12px;
        z-index: 10;
      }
      .vfm--resize-t[data-v-2836fdb5] {
        top: -6px;
        left: 0;
        width: 100%;
        height: 12px;
        cursor: ns-resize;
      }
      .vfm--resize-tr[data-v-2836fdb5] {
        top: -6px;
        right: -6px;
        cursor: nesw-resize;
      }
      .vfm--resize-r[data-v-2836fdb5] {
        top: 0;
        right: -6px;
        width: 12px;
        height: 100%;
        cursor: ew-resize;
      }
      .vfm--resize-br[data-v-2836fdb5] {
        bottom: -6px;
        right: -6px;
        cursor: nwse-resize;
      }
      .vfm--resize-b[data-v-2836fdb5] {
        bottom: -6px;
        left: 0;
        width: 100%;
        height: 12px;
        cursor: ns-resize;
      }
      .vfm--resize-bl[data-v-2836fdb5] {
        bottom: -6px;
        left: -6px;
        cursor: nesw-resize;
      }
      .vfm--resize-l[data-v-2836fdb5] {
        top: 0;
        left: -6px;
        width: 12px;
        height: 100%;
        cursor: ew-resize;
      }
      .vfm--resize-tl[data-v-2836fdb5] {
        top: -6px;
        left: -6px;
        cursor: nwse-resize;
      }
    </style>
   <link rel="stylesheet" href="./Cta.44e812de.css">
  </head>
  <body class="font-sans">
    <div id="app" data-server-rendered="true" data-v-app="">
      <!---->
      <div class="modals-container"></div>
      <!---->
      <div
        class="site-content bg-white overflow-hidden"
        data-testid="site-content"
      >
        <section
          id="9bm4j4crjs"
          class="pt-8 overflow-hidden sm:pt-12 lg:relative lg:py-24 xl:py-36 2xl:py-48"
          sectionname="hero"
          imagestretch="true"
          sectioncomponent="Hero"
          sortorder="0"
        >
          <div
            class="max-w-md px-4 mx-auto sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl lg:grid lg:grid-cols-2 lg:gap-24"
          >
            <div class="relative z-[1]">
              <div href="" class="flex items-center space-x-2">
                <img
                  class="w-auto h-8"
                  src="./cableCharge-1687017931755.svg"
                  alt="CableCharge logo"
                />
                <p class="font-sans font-bold text-gray-900 text-2xl">
                  CableCharge
                </p>
              </div>
              <div class="mt-14">
                <div class="mt-6 sm:max-w-xl">
                  <h1
                    class="text-4xl font-black tracking-tight text-gray-900 sm:text-6xl md:text-7xl"
                  >
                    Recharge your Cable Connection with Ease<span
                      class="text-primary"
                      >.</span
                    >
                  </h1>
                  <h2 class="mt-6 text-lg text-gray-500 sm:text-xl">
                    Enjoy an uninterrupted TV viewing experience by recharging
                    your cable connection online with us.
                  </h2>
                </div>
                <div class="mt-10 space-y-4">
                  <!----><!---->
                    <div>
                      <a
                        href="login.php"
                        class="ui-button ui-button-base ui-button-primary"
                        style="width: 14rem;"
                      >
                        Login
                    </a>
                    </div>
                </div>
                <!---->
              </div>
            </div>
          </div>
          <div class="sm:pl-6">
            <div
              class="py-12 sm:relative sm:mt-12 sm:py-16 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2"
            >
              <div class="hidden sm:block">
                <div
                  class="absolute inset-y-0 w-screen left-1/2 bg-gray-50 rounded-l-3xl lg:left-80 lg:right-0 lg:w-full"
                ></div>
                <svg
                  class="absolute -mr-3 top-8 right-1/2 lg:m-0 lg:left-0"
                  width="404"
                  height="392"
                  fill="none"
                  viewBox="0 0 404 392"
                >
                  <defs>
                    <pattern
                      id="837c3e70-6c3a-44e6-8854-cc48c737b659"
                      x="0"
                      y="0"
                      width="20"
                      height="20"
                      patternUnits="userSpaceOnUse"
                    >
                      <rect
                        x="0"
                        y="0"
                        width="4"
                        height="4"
                        class="text-gray-200"
                        fill="currentColor"
                      ></rect>
                    </pattern>
                  </defs>
                  <rect
                    width="404"
                    height="392"
                    fill="url(#837c3e70-6c3a-44e6-8854-cc48c737b659)"
                  ></rect>
                </svg>
              </div>
              <div
                class="relative pl-4 ml-auto sm:max-w-3xl sm:px-0 lg:h-full lg:max-w-none lg:flex lg:items-center xl:pl-12"
              >
                <!----><img
                  class="w-full rounded-l-3xl lg:w-auto 2xl:h-full 2xl:max-w-none 2xl:rounded-3xl"
                  src="hero.avif"
                  alt="CableCharge"
                />
              </div>
            </div>
          </div>
        </section>
        <section
          class="relative pt-16 pb-32 overflow-hidden bg-white space-y-24"
          sectionname="features"
          id="d9hc5ge4d6"
          sectioncomponent="Features"
          sortorder="1"
          site-name="CableCharge"
          site-id=""
        >
          <div>
            <div
              class="lg:mx-auto lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-6 xl:gap-12 2xl:gap-24"
            >
              <div
                class="max-w-xl px-4 mx-auto space-y-6 sm:px-6 lg:py-28 xl:py-32 2xl:mx-0 lg:col-start-2 lg:mx-0 lg:px-0 lg:pr-8"
              >
                <div>
                  <h2
                    class="text-4xl font-extrabold tracking-tight text-gray-900"
                  >
                    24x7 accessibility<span class="text-primary">.</span>
                  </h2>
                  <p
                    class="mt-4 text-lg leading-relaxed text-gray-500 sm:text-xl"
                  >
                    With CableCharge, you can recharge your cable connection at
                    any time of the day or night, from the comfort of your home.
                  </p>
                </div>
                <div><!----></div>
                <!---->
              </div>
              <div class="mt-12 sm:mt-16 lg:mt-0 lg:col-start-1">
                <div
                  class="lg:px-0 lg:m-0 lg:relative lg:h-full lg:flex lg:items-center pr-4 -sm:ml-48 sm:pr-6 md:-ml-16"
                >
                  <!----><img
                    src="24x7.avif"
                    class="lg:right-0 rounded-r-2xl w-full 2xl:max-h-[44rem]"
                    alt="24x7 accessibility"
                  />
                </div>
              </div>
            </div>
          </div>
          <div>
            <div
              class="lg:mx-auto lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-6 xl:gap-12 2xl:gap-24"
            >
              <div
                class="max-w-xl px-4 mx-auto space-y-6 sm:px-6 lg:py-28 xl:py-32 2xl:mx-0 lg:mx-auto lg:max-w-3xl xl:pl-12 2xl:pl-20 2xl:justify-self-end"
              >
                <div>
                  <h2
                    class="text-4xl font-extrabold tracking-tight text-gray-900"
                  >
                    Wide range of payment options<span class="text-primary"
                      >.</span
                    >
                  </h2>
                  <p
                    class="mt-4 text-lg leading-relaxed text-gray-500 sm:text-xl"
                  >
                    Our platform accepts a range of payment options, including
                    credit cards, debit cards, and UPI, so you can choose the
                    one that suits you the best.
                  </p>
                </div>
                <div><!----></div>
                <!---->
              </div>
              <div class="mt-12 sm:mt-16 lg:mt-0">
                <div
                  class="lg:px-0 lg:m-0 lg:relative lg:h-full lg:flex lg:items-center pl-4 sm:-mr-48 sm:-mr-6 sm:pl-6 md:-mr-16"
                >
                  <!----><img
                    src="payment-options.avif"
                    class="rounded-l-2xl lg:left-0 w-full 2xl:max-h-[44rem]"
                    alt="Wide range of payment options"
                  />
                </div>
              </div>
            </div>
          </div>
          <div>
            <div
              class="lg:mx-auto lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-6 xl:gap-12 2xl:gap-24"
            >
              <div
                class="max-w-xl px-4 mx-auto space-y-6 sm:px-6 lg:py-28 xl:py-32 2xl:mx-0 lg:col-start-2 lg:mx-0 lg:px-0 lg:pr-8"
              >
                <div>
                  <h2
                    class="text-4xl font-extrabold tracking-tight text-gray-900"
                  >
                    Instant confirmation<span class="text-primary">.</span>
                  </h2>
                  <p
                    class="mt-4 text-lg leading-relaxed text-gray-500 sm:text-xl"
                  >
                    Once you make your payment and recharge your cable
                    connection, you can expect instant confirmation on your
                    screen.
                  </p>
                </div>
                <div><!----></div>
                <!---->
              </div>
              <div class="mt-12 sm:mt-16 lg:mt-0 lg:col-start-1">
                <div
                  class="lg:px-0 lg:m-0 lg:relative lg:h-full lg:flex lg:items-center pr-4 -sm:ml-48 sm:pr-6 md:-ml-16"
                >
                  <!----><img
                    src="confirmation.avif"
                    class="lg:right-0 rounded-r-2xl w-full 2xl:max-h-[44rem]"
                    alt="Instant confirmation"
                  />
                </div>
              </div>
            </div>
          </div>
        </section>
        <section
          class="py-12 overflow-hidden bg-primary bg-opacity-80 md:py-20"
          sectionname="testimonials"
          id="txrurpdq6h"
          sectioncomponent="Testimonials"
          sortorder="2"
          site-name="CableCharge"
          reselecting-images="false"
        >
          <div class="relative px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <svg
              class="absolute transform top-full right-full translate-x-1/3 -translate-y-1/4 lg:translate-x-1/2 xl:-translate-y-1/2 rotate-3"
              width="404"
              height="404"
              fill="none"
              viewBox="0 0 404 404"
              role="img"
              aria-labelledby="svg-squares"
            >
              <title id="svg-squares">squares</title>
              <defs>
                <pattern
                  id="ad119f34-7694-4c31-947f-5c9d249b21f3"
                  x="0"
                  y="0"
                  width="20"
                  height="20"
                  patternUnits="userSpaceOnUse"
                >
                  <rect
                    x="0"
                    y="0"
                    width="4"
                    height="4"
                    class="text-primary"
                    fill="currentColor"
                  ></rect>
                </pattern>
              </defs>
              <rect
                width="404"
                height="404"
                fill="url(#ad119f34-7694-4c31-947f-5c9d249b21f3)"
              ></rect>
            </svg>
            <div class="relative">
              <blockquote>
                <div
                  class="max-w-3xl mx-auto text-xl font-bold leading-7 text-center text-white md:leading-10 md:text-3xl text-shadow-sm"
                >
                  <p>
                    "You can easily recharge anytime, anywhere, without the nedd to be dependent. CableCharge has made it so
                    much easier!"
                  </p>
                </div>
                <footer class="mt-8">
                  <div class="md:flex md:items-center md:justify-center">
                    <div class="md:flex-shrink-0">
                    </div>
                    <div
                      class="mt-3 text-center md:mt-0 md:ml-3 md:flex md:items-center text-shadow-sm"
                    >
                      <div class="text-lg font-medium text-white">
                        - Team
                      </div>
                      <!---->
                    </div>
                  </div>
                </footer>
              </blockquote>
            </div>
          </div>
        </section>
        <!---->
        <section
          class="relative py-12 sm:py-20 md:py-24 lg:py-32"
          sectionname="cta"
          id="94duugc6df"
          sectioncomponent="Cta"
          sortorder="4"
          site-name="CableCharge"
          reselecting-images="false"
          data-v-79ccdc36=""
        >
          <div aria-hidden="true" class="block" data-v-79ccdc36="">
            <div
              class="absolute inset-y-0 left-0 w-1/2 bg-gray-50 rounded-r-3xl mb-12"
              data-v-79ccdc36=""
            ></div>
            <svg
              class="absolute -ml-3 top-8 left-1/2"
              width="404"
              height="392"
              fill="none"
              viewBox="0 0 404 392"
              data-v-79ccdc36=""
            >
              <defs data-v-79ccdc36="">
                <pattern
                  id="8228f071-bcee-4ec8-905a-2a059a2cc4fb"
                  x="0"
                  y="0"
                  width="20"
                  height="20"
                  patternUnits="userSpaceOnUse"
                  data-v-79ccdc36=""
                >
                  <rect
                    x="0"
                    y="0"
                    width="4"
                    height="4"
                    class="text-gray-200"
                    fill="currentColor"
                    data-v-79ccdc36=""
                  ></rect>
                </pattern>
              </defs>
              <rect
                width="404"
                height="392"
                fill="url(#8228f071-bcee-4ec8-905a-2a059a2cc4fb)"
                data-v-79ccdc36=""
              ></rect>
            </svg>
          </div>
          <div
            class="max-w-md px-4 mx-auto sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8"
            data-v-79ccdc36=""
          >
            <div
              class="relative px-6 py-10 overflow-hidden bg-white border-primary border-2 shadow-xl rounded-2xl sm:px-12 sm:py-20"
              data-v-79ccdc36=""
            >
              <div
                aria-hidden="true"
                class="absolute inset-0 -mt-72 sm:-mt-32 md:mt-0"
                data-v-79ccdc36=""
              >
                <svg
                  class="absolute inset-0 w-full h-full"
                  preserveAspectRatio="xMidYMid slice"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 1463 360"
                  data-v-79ccdc36=""
                >
                  <path
                    class="text-primary/5"
                    fill="currentColor"
                    d="M-82.673 72l1761.849 472.086-134.327 501.315-1761.85-472.086z"
                    data-v-79ccdc36=""
                  ></path>
                  <path
                    class="text-primary/10"
                    fill="currentColor"
                    d="M-217.088 544.086L1544.761 72l134.327 501.316-1761.849 472.086z"
                    data-v-79ccdc36=""
                  ></path>
                </svg>
              </div>
              <div class="relative" data-v-79ccdc36="">
                <div
                  class="flex flex-wrap justify-center w-full mx-auto sm:max-w-3xl"
                  data-v-79ccdc36=""
                >
                  <img
                    src="1.avif"
                    alt="User ben"
                    class="user-avatar"
                    data-v-79ccdc36=""
                  /><img
                    src="2.avif"
                    alt="User claire"
                    class="user-avatar"
                    data-v-79ccdc36=""
                  /><img
                    src="3.avif"
                    alt="User iwan"
                    class="user-avatar"
                    data-v-79ccdc36=""
                  /><img
                    src="4.avif"
                    alt="User lori"
                    class="user-avatar"
                    data-v-79ccdc36=""
                  /><img
                    src="5.avif"
                    alt="User mali"
                    class="user-avatar"
                    data-v-79ccdc36=""
                  /><img
                    src="6.avif"
                    alt="User mi"
                    class="user-avatar"
                    data-v-79ccdc36=""
                  /><img
                    src="7.avif"
                    alt="User nim"
                    class="user-avatar"
                    data-v-79ccdc36=""
                  /><img
                    src="8.avif"
                    alt="User san"
                    class="user-avatar"
                    data-v-79ccdc36=""
                  /><img
                    src="9.avif"
                    alt="User sanjid"
                    class="user-avatar"
                    data-v-79ccdc36=""
                  /><img
                    src="10.avif"
                    alt="User steph"
                    class="user-avatar"
                    data-v-79ccdc36=""
                  /><img
                    src="11.avif"
                    alt="User zak"
                    class="user-avatar"
                    data-v-79ccdc36=""
                  /><img
                    src="12.avif"
                    alt="User judith"
                    class="user-avatar"
                    data-v-79ccdc36=""
                  />
                </div>
                <div class="mt-6 sm:mt-12 sm:text-center" data-v-79ccdc36="">
                  <h2
                    class="text-3xl font-black tracking-tight text-gray-900 sm:text-4xl md:text-5xl md:leading-tight md:max-w-4xl md:mx-auto"
                    data-v-79ccdc36=""
                  >
                    Recharge now with CableCharge<span
                      class="text-primary"
                      data-v-79ccdc36=""
                      >.</span
                    >
                  </h2>
                  <!---->
                </div>
                <div
                  class="mt-6 sm:mt-12 sm:mx-auto sm:max-w-lg flex flex-col items-center"
                  data-v-79ccdc36=""
                >
                  <!---->
                </div>
                <form
                  class="grid gap-2 grid-cols-1 sm:w-full sm:flex sm:items-center sm:flex-wrap mt-6 sm:mt-12 sm:mx-auto sm:max-w-lg"
                  client:load=""
                  data-v-79ccdc36=""
                >
                  <label for="cta-email" class="sr-only">Email address</label
                  ><input
                    id="cta-email"
                    type="email"
                    class="block w-full px-5 py-3 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary focus-visible:ring-primary flex-1"
                    required=""
                    placeholder="Enter your email..."
                  />
                  <div>
                    <button
                      to=""
                      class="ui-button ui-button-base ui-button-primary"
                      type="submit"
                    >
                      Submit
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
        <!----><!---->
        <div
          class="wrap w-max max-w-xs animate-in fade-in delay-[1000] duration-700"
          data-v-3a533e3d=""
        >
          <!---->
        </div>
      </div>
    </div>
    <link rel="stylesheet" href="index.css" />
    
  </body>
</html>
