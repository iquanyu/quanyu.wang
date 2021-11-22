<template>
  <app-layout title="Article">
    <article class="xl:divide-y xl:divide-gray-200">
      <header class="pt-6 xl:pb-10">
        <div class="space-y-1 text-center">
          <dl class="space-y-10">
            <div>
              <dt class="sr-only">Published on</dt>
              <dd class="text-base leading-6 font-medium text-gray-500">
                <time datetime="2021-04-14T16:00:00.000Z">Thursday, April 15, 2021</time>
              </dd>
            </div>
          </dl>
          <div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl md:text-5xl md:leading-[3.5rem]">Headless UI&nbsp;v1.0</h1>
          </div>
        </div>
      </header>
      <div class="divide-y xl:divide-y-0 divide-gray-200 xl:grid xl:grid-cols-4 xl:gap-x-6 pb-16 xl:pb-20"
           style="grid-template-rows: auto 1fr;">
        <dl class="pt-6 pb-10 xl:pt-11 xl:border-b xl:border-gray-200">
          <dt class="sr-only">Authors</dt>
          <dd>
            <ul class="flex justify-center xl:block space-x-8 sm:space-x-12 xl:space-x-0 xl:space-y-8">
              <li class="flex items-center space-x-2">
                <img src="https://ui-avatars.com/api/?name=admin&color=F97316&background=EBF4FF"
                     alt
                     class="w-10 h-10 rounded-full" />
                <dl class="text-sm font-medium whitespace-no-wrap">
                  <dt class="sr-only">Name</dt>
                  <dd class="text-gray-900">Adam Wathan</dd>
                  <dt class="sr-only">Twitter</dt>
                  <dd>
                    <a href="https://twitter.com/adamwathan"
                       class="text-orange-600 hover:text-orange-700">@adamwathan</a>
                  </dd>
                </dl>
              </li>
            </ul>
          </dd>
        </dl>
        <div class="divide-y divide-gray-200 xl:pb-0 xl:col-span-3 xl:row-span-2">
          <div class="max-w-none pt-10 pb-8">
            <div class="prose max-w-none">
              <p>
                Last fall we announced
                <a href="https://blog.tailwindcss.com/headless-ui-unstyled-accessible-ui-components">Headless UI</a>, a library of completely unstyled, fully accessible UI components, designed to pair perfectly with Tailwind CSS.
              </p>
              <p>
                Today we’re super excited to release
                <a href="https://headlessui.dev">Headless UI v1.0</a>, which more than doubles the amount of included components for both React and Vue.
              </p>
              <a href="https://headlessui.dev">
                <img src="https://blog.tailwindcss.com/_next/static/media/card.e01b0ae06588538125e9e683d0ceed01.jpg"
                     alt="Headless UI" />
              </a>
              <h2>What’s new</h2>
              <p>We’ve added four new components to the React library, and five new components for Vue.</p>
              <h3>Dialog (modal)</h3>
              <p>Headless UI now includes a robust dialog implementation you can use to build traditional modal dialogs, mobile slide-out menus, or any other take-over-style UI that needs to capture the focus of the entire page.</p>
              <pre class="language-jsx"><code class="language-jsx"><span class="token keyword module">import</span> <span class="token imports"><span class="token punctuation">{</span> useState <span class="token punctuation">}</span></span> <span class="token keyword module">from</span> <span class="token string">'react'</span>
<span class="token keyword module">import</span> <span class="token imports"><span class="token punctuation">{</span> <span class="token maybe-class-name">Dialog</span> <span class="token punctuation">}</span></span> <span class="token keyword module">from</span> <span class="token string">'@headlessui/react'</span>

<span class="token keyword">function</span> <span class="token function"><span class="token maybe-class-name">MyDialog</span></span><span
  class="token punctuation"
>(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
  <span class="token keyword">let</span> <span class="token punctuation">[</span>isOpen<span class="token punctuation">,</span> setIsOpen<span class="token punctuation">]</span> <span class="token operator">=</span> <span class="token function">useState</span><span class="token punctuation">(</span><span class="token boolean">true</span><span class="token punctuation">)</span>

  <span class="token keyword control-flow">return</span> <span class="token punctuation">(</span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span><span class="token class-name">Dialog</span></span> <span class="token attr-name">open</span><span class="token script language-javascript"><span class="token script-punctuation punctuation">=</span><span class="token punctuation">{</span>isOpen<span class="token punctuation">}</span></span> <span class="token attr-name">onClose</span><span class="token script language-javascript"><span class="token script-punctuation punctuation">=</span><span class="token punctuation">{</span>setIsOpen<span class="token punctuation">}</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>
      </span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span><span class="token class-name">Dialog.Overlay</span></span> <span class="token punctuation">/&gt;</span></span><span
  class="token plain-text"
>

      </span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span><span class="token class-name">Dialog.Title</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>Deactivate account</span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span><span class="token class-name">Dialog.Title</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>
      </span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span><span class="token class-name">Dialog.Description</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>
        This will permanently deactivate your account
      </span><span
  class="token tag"
><span class="token tag"><span class="token punctuation">&lt;/</span><span class="token class-name">Dialog.Description</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>

      </span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>
        Are you sure you want to deactivate your account? All of your data will
        be permanently removed. This action cannot be undone.
      </span><span
  class="token tag"
><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>

      </span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">onClick</span><span class="token script language-javascript"><span class="token script-punctuation punctuation">=</span><span class="token punctuation">{</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token arrow operator">=&gt;</span> <span class="token function">setIsOpen</span><span class="token punctuation">(</span><span class="token boolean">false</span><span class="token punctuation">)</span><span class="token punctuation">}</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>Deactivate</span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>
      </span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">onClick</span><span class="token script language-javascript"><span class="token script-punctuation punctuation">=</span><span class="token punctuation">{</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token arrow operator">=&gt;</span> <span class="token function">setIsOpen</span><span class="token punctuation">(</span><span class="token boolean">false</span><span class="token punctuation">)</span><span class="token punctuation">}</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>Cancel</span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>
    </span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span><span class="token class-name">Dialog</span></span><span
  class="token punctuation"
>&gt;</span></span>
  <span class="token punctuation">)</span>
<span class="token punctuation">}</span></code></pre>
              <h3>Disclosure</h3>
              <p>
                We’ve added a new
                <code>Disclosure</code> component that makes it easy to show/hide inline content accessibly. This is useful for things like collapsible FAQ questions, "show more" interfaces, or even hamburger menus that open up and push the rest of the page content away.
              </p>
              <pre class="language-html"><code class="language-html"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>template</span><span
  class="token punctuation"
>&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>Disclosure</span><span
  class="token punctuation"
>&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>DisclosureButton</span><span
  class="token punctuation"
>&gt;</span></span> Is team pricing available? <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>DisclosureButton</span><span
  class="token punctuation"
>&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>DisclosurePanel</span><span
  class="token punctuation"
>&gt;</span></span>
      Yes! You can purchase a license that you can share with your entire team.
    <span
  class="token tag"
><span class="token tag"><span class="token punctuation">&lt;/</span>DisclosurePanel</span><span
  class="token punctuation"
>&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>Disclosure</span><span
  class="token punctuation"
>&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>template</span><span
  class="token punctuation"
>&gt;</span></span>

<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>script</span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token script"
><span class="token language-javascript">
  <span class="token keyword module">import</span> <span class="token imports"><span class="token punctuation">{</span>
    <span class="token maybe-class-name">Disclosure</span><span class="token punctuation">,</span>
    <span class="token maybe-class-name">DisclosureButton</span><span class="token punctuation">,</span>
    <span class="token maybe-class-name">DisclosurePanel</span><span class="token punctuation">,</span>
  <span class="token punctuation">}</span></span> <span class="token keyword module">from</span> <span class="token string">'@headlessui/vue'</span>

  <span class="token keyword module">export</span> <span class="token keyword module">default</span> <span class="token punctuation">{</span>
    components<span class="token operator">:</span> <span class="token punctuation">{</span> <span class="token maybe-class-name">Disclosure</span><span class="token punctuation">,</span> <span class="token maybe-class-name">DisclosureButton</span><span class="token punctuation">,</span> <span class="token maybe-class-name">DisclosurePanel</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
  <span class="token punctuation">}</span>
</span></span><span
  class="token tag"
><span class="token tag"><span class="token punctuation">&lt;/</span>script</span><span
  class="token punctuation"
>&gt;</span></span></code></pre>
              <h3>Radio Group</h3>
              <p>
                There’s now a
                <code>RadioGroup</code> component that you can use to build totally custom radio button UIs, like when you want to use fancy cards or something instead of a simple little radio circle.
              </p>
              <pre class="language-jsx"><code class="language-jsx"><span class="token keyword module">import</span> <span class="token imports"><span class="token punctuation">{</span> useState <span class="token punctuation">}</span></span> <span class="token keyword module">from</span> <span class="token string">'react'</span>
<span class="token keyword module">import</span> <span class="token imports"><span class="token punctuation">{</span> <span class="token maybe-class-name">RadioGroup</span> <span class="token punctuation">}</span></span> <span class="token keyword module">from</span> <span class="token string">'@headlessui/react'</span>

<span class="token keyword">function</span> <span class="token function"><span class="token maybe-class-name">MyRadioGroup</span></span><span
  class="token punctuation"
>(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
  <span class="token keyword">let</span> <span class="token punctuation">[</span>plan<span class="token punctuation">,</span> setPlan<span class="token punctuation">]</span> <span class="token operator">=</span> <span class="token function">useState</span><span class="token punctuation">(</span><span class="token string">'startup'</span><span class="token punctuation">)</span>

  <span class="token keyword control-flow">return</span> <span class="token punctuation">(</span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span><span class="token class-name">RadioGroup</span></span> <span class="token attr-name">value</span><span class="token script language-javascript"><span class="token script-punctuation punctuation">=</span><span class="token punctuation">{</span>plan<span class="token punctuation">}</span></span> <span class="token attr-name">onChange</span><span class="token script language-javascript"><span class="token script-punctuation punctuation">=</span><span class="token punctuation">{</span>setPlan<span class="token punctuation">}</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>
      </span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span><span class="token class-name">RadioGroup.Label</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>Plan</span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span><span class="token class-name">RadioGroup.Label</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>
      </span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span><span class="token class-name">RadioGroup.Option</span></span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>startup<span class="token punctuation">"</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>
        </span><span class="token punctuation">{</span><span class="token punctuation">(</span><span class="token parameter"><span class="token punctuation">{</span> checked <span class="token punctuation">}</span></span><span
  class="token punctuation"
>)</span> <span class="token arrow operator">=&gt;</span> <span class="token punctuation">(</span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">className</span><span class="token script language-javascript"><span class="token script-punctuation punctuation">=</span><span class="token punctuation">{</span>checked <span class="token operator">?</span> <span class="token string">'bg-blue-200'</span> <span class="token operator">:</span> <span class="token string">''</span><span class="token punctuation">}</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>Startup</span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span
  class="token punctuation"
>&gt;</span></span>
        <span class="token punctuation">)</span><span class="token punctuation">}</span><span class="token plain-text">
      </span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span><span class="token class-name">RadioGroup.Option</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>
      </span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span><span class="token class-name">RadioGroup.Option</span></span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>business<span class="token punctuation">"</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>
        </span><span class="token punctuation">{</span><span class="token punctuation">(</span><span class="token parameter"><span class="token punctuation">{</span> checked <span class="token punctuation">}</span></span><span
  class="token punctuation"
>)</span> <span class="token arrow operator">=&gt;</span> <span class="token punctuation">(</span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">className</span><span class="token script language-javascript"><span class="token script-punctuation punctuation">=</span><span class="token punctuation">{</span>checked <span class="token operator">?</span> <span class="token string">'bg-blue-200'</span> <span class="token operator">:</span> <span class="token string">''</span><span class="token punctuation">}</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>Business</span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span
  class="token punctuation"
>&gt;</span></span>
        <span class="token punctuation">)</span><span class="token punctuation">}</span><span class="token plain-text">
      </span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span><span class="token class-name">RadioGroup.Option</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>
      </span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span><span class="token class-name">RadioGroup.Option</span></span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>enterprise<span class="token punctuation">"</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>
        </span><span class="token punctuation">{</span><span class="token punctuation">(</span><span class="token parameter"><span class="token punctuation">{</span> checked <span class="token punctuation">}</span></span><span
  class="token punctuation"
>)</span> <span class="token arrow operator">=&gt;</span> <span class="token punctuation">(</span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">className</span><span class="token script language-javascript"><span class="token script-punctuation punctuation">=</span><span class="token punctuation">{</span>checked <span class="token operator">?</span> <span class="token string">'bg-blue-200'</span> <span class="token operator">:</span> <span class="token string">''</span><span class="token punctuation">}</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>Enterprise</span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span
  class="token punctuation"
>&gt;</span></span>
        <span class="token punctuation">)</span><span class="token punctuation">}</span><span class="token plain-text">
      </span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span><span class="token class-name">RadioGroup.Option</span></span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token plain-text"
>
    </span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span><span class="token class-name">RadioGroup</span></span><span
  class="token punctuation"
>&gt;</span></span>
  <span class="token punctuation">)</span>
<span class="token punctuation">}</span></code></pre>
              <h3>Popover</h3>
              <p>
                The new
                <code>Popover</code> component lets you build custom dropdown UIs that don’t have any content restrictions like a regular
                <code>Menu</code> component would. Great for fly-out menus on marketing sites, dropdowns that have form fields in them, and tons more.
              </p>
              <pre class="language-html"><code class="language-html"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>template</span><span
  class="token punctuation"
>&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>Popover</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>relative<span class="token punctuation">"</span></span><span
  class="token punctuation"
>&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>PopoverButton</span><span
  class="token punctuation"
>&gt;</span></span>Solutions<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>PopoverButton</span><span
  class="token punctuation"
>&gt;</span></span>

    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>PopoverPanel</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>absolute z-10<span class="token punctuation">"</span></span><span
  class="token punctuation"
>&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span><span
  class="token punctuation"
>&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>/analytics<span class="token punctuation">"</span></span><span
  class="token punctuation"
>&gt;</span></span>Analytics<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span
  class="token punctuation"
>&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>/engagement<span class="token punctuation">"</span></span><span
  class="token punctuation"
>&gt;</span></span>Engagement<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span
  class="token punctuation"
>&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>/security<span class="token punctuation">"</span></span><span
  class="token punctuation"
>&gt;</span></span>Security<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span
  class="token punctuation"
>&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>/integrations<span class="token punctuation">"</span></span><span
  class="token punctuation"
>&gt;</span></span>Integrations<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span
  class="token punctuation"
>&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span
  class="token punctuation"
>&gt;</span></span>

      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>img</span> <span class="token attr-name">src</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>/solutions.jpg<span class="token punctuation">"</span></span> <span class="token attr-name">alt</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span> <span class="token punctuation">/&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>PopoverPanel</span><span
  class="token punctuation"
>&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>Popover</span><span
  class="token punctuation"
>&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>template</span><span
  class="token punctuation"
>&gt;</span></span>

<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>script</span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token script"
><span class="token language-javascript">
  <span class="token keyword module">import</span> <span class="token imports"><span class="token punctuation">{</span> <span class="token maybe-class-name">Popover</span><span class="token punctuation">,</span> <span class="token maybe-class-name">PopoverButton</span><span class="token punctuation">,</span> <span class="token maybe-class-name">PopoverPanel</span> <span class="token punctuation">}</span></span> <span class="token keyword module">from</span> <span class="token string">'@headlessui/vue'</span>

  <span class="token keyword module">export</span> <span class="token keyword module">default</span> <span class="token punctuation">{</span>
    components<span class="token operator">:</span> <span class="token punctuation">{</span> <span class="token maybe-class-name">Popover</span><span class="token punctuation">,</span> <span class="token maybe-class-name">PopoverButton</span><span class="token punctuation">,</span> <span class="token maybe-class-name">PopoverPanel</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>
  <span class="token punctuation">}</span>
</span></span><span
  class="token tag"
><span class="token tag"><span class="token punctuation">&lt;/</span>script</span><span
  class="token punctuation"
>&gt;</span></span></code></pre>
              <h3>TransitionRoot and TransitionChild (for Vue)</h3>
              <p>
                Headless UI already had a
                <code>Transition</code> component for React, but we’ve always recommended the native
                <code>&lt;transition&gt;</code> that already ships with Vue for Vue users. There are some limitations to the native transition though, and things can get complicated when trying to co-ordinate nested transitions that are supposed to run in parallel.
              </p>
              <p>
                Headless UI v1.0 brings our React
                <code>Transition</code> component to Vue as well, which makes it a lot easier to transition things like modal dialogs.
              </p>
              <pre class="language-html"><code class="language-html"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>template</span><span
  class="token punctuation"
>&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>!—</span> <span class="token attr-name">This</span> <span class="token attr-name">`show`</span> <span class="token attr-name">prop</span> <span class="token attr-name">controls</span> <span class="token attr-name">all</span> <span class="token attr-name">nested</span> <span class="token attr-name">`Transition.Child`</span> <span class="token attr-name">components.</span> <span class="token attr-name">—</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>TransitionRoot</span> <span class="token attr-name">:show</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>isOpen<span class="token punctuation">"</span></span><span
  class="token punctuation"
>&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>!—</span> <span class="token attr-name">Background</span> <span class="token attr-name">overlay</span> <span class="token attr-name">—</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>TransitionChild</span>
      <span class="token attr-name">enter</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>transition-opacity<span class="token punctuation">"</span></span>
      <span class="token attr-name">ease-linear</span>
      <span class="token attr-name">duration-300"</span>
      <span class="token attr-name">enter-from</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>opacity-0<span class="token punctuation">"</span></span>
      <span class="token attr-name">enter-to</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>opacity-100<span class="token punctuation">"</span></span>
      <span class="token attr-name">leave</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>transition-opacity<span class="token punctuation">"</span></span>
      <span class="token attr-name">ease-linear</span>
      <span class="token attr-name">duration-300"</span>
      <span class="token attr-name">leave-from</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>opacity-100<span class="token punctuation">"</span></span>
      <span class="token attr-name">leave-to</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>opacity-0<span class="token punctuation">"</span></span>
    <span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>!—</span> <span class="token attr-name">…</span> <span class="token attr-name">—</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>TransitionChild</span><span
  class="token punctuation"
>&gt;</span></span>

    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>!—</span> <span class="token attr-name">Sliding</span> <span class="token attr-name">sidebar</span> <span class="token attr-name">—</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>TransitionChild</span>
      <span class="token attr-name">enter</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>transition<span class="token punctuation">"</span></span>
      <span class="token attr-name">ease-in-out</span>
      <span class="token attr-name">duration-300</span>
      <span class="token attr-name">transform"</span>
      <span class="token attr-name">enter-from</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>-translate-x-full<span class="token punctuation">"</span></span>
      <span class="token attr-name">enter-to</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>translate-x-0<span class="token punctuation">"</span></span>
      <span class="token attr-name">leave</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>transition<span class="token punctuation">"</span></span>
      <span class="token attr-name">ease-in-out</span>
      <span class="token attr-name">duration-300</span>
      <span class="token attr-name">transform"</span>
      <span class="token attr-name">leave-from</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>translate-x-0<span class="token punctuation">"</span></span>
      <span class="token attr-name">leave-to</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>-translate-x-full<span class="token punctuation">"</span></span>
    <span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>!—</span> <span class="token attr-name">…</span> <span class="token attr-name">—</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>TransitionChild</span><span
  class="token punctuation"
>&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>TransitionRoot</span><span
  class="token punctuation"
>&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>template</span><span
  class="token punctuation"
>&gt;</span></span>

<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>script</span><span
  class="token punctuation"
>&gt;</span></span><span
  class="token script"
><span class="token language-javascript">
  <span class="token keyword module">import</span> <span class="token imports"><span class="token punctuation">{</span> ref <span class="token punctuation">}</span></span> <span class="token keyword module">from</span> <span class="token string">"vue"</span><span class="token punctuation">;</span>
  <span class="token keyword module">import</span> <span class="token imports"><span class="token punctuation">{</span> <span class="token maybe-class-name">Transition</span><span class="token punctuation">,</span> <span class="token maybe-class-name">TransitionChild</span> <span class="token punctuation">}</span></span> <span class="token keyword module">from</span> <span class="token string">"@headlessui/vue"</span><span class="token punctuation">;</span>

  <span class="token keyword module">export</span> <span class="token keyword module">default</span> <span class="token punctuation">{</span>
    components<span class="token operator">:</span> <span class="token punctuation">{</span> <span class="token maybe-class-name">TransitionRoot</span><span class="token operator">:</span> <span class="token maybe-class-name">Transition</span><span class="token punctuation">,</span> <span class="token maybe-class-name">TransitionChild</span> <span class="token punctuation">}</span><span class="token punctuation">,</span>

    <span class="token function">setup</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
      <span class="token keyword">const</span> isShowing <span class="token operator">=</span> <span class="token function">ref</span><span class="token punctuation">(</span><span class="token boolean">true</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

      <span class="token keyword control-flow">return</span> <span class="token punctuation">{</span>
        isShowing<span class="token punctuation">,</span>
      <span class="token punctuation">}</span><span class="token punctuation">;</span>
    <span class="token punctuation">}</span><span class="token punctuation">,</span>
  <span class="token punctuation">}</span><span class="token punctuation">;</span>
</span></span><span
  class="token tag"
><span class="token tag"><span class="token punctuation">&lt;/</span>script</span><span
  class="token punctuation"
>&gt;</span></span></code></pre>
              <h2>Try it out</h2>
              <p>
                Head over to our
                <a href="https://headlessui.dev">brand new documentation website</a> to pull Headless UI into your projects and play with it! It’s MIT licensed and open-source, so if you’d like to poke around the code or you need to report an issue,
                <a href="https://github.com/tailwindlabs/headlessui">visit the GitHub repository</a>.
              </p>
            </div>
          </div>
          <div class="pt-6 pb-16">
            <p>
              Want to try it out?
              <a href="https://headlessui.dev"
                 class="font-medium text-orange-600 hover:text-orange-700">Visit the Headless UI website →</a>
            </p>
          </div>
        </div>
        <footer class="text-sm font-medium divide-y divide-gray-200 xl:col-start-1 xl:row-start-2">
          <div class="space-y-8 py-8">
            <div>
              <h2 class="text-xs leading-5 tracking-wide uppercase text-gray-500">Next Article</h2>
              <div class="text-orange-600 hover:text-orange-700">
                <a href="/tailwind-ui-now-with-react-and-vue-support">Tailwind UI: Now with React + Vue support</a>
              </div>
            </div>
            <div>
              <h2 class="text-xs leading-5 tracking-wide uppercase text-gray-500">Previous Article</h2>
              <div class="text-orange-600 hover:text-orange-700">
                <a href="/tailwindcss-2-1">Tailwind CSS v2.1</a>
              </div>
            </div>
          </div>
          <div class="pt-8">
            <a class="text-orange-600 hover:text-orange-700"
               href="/">← Back to the blog</a>
          </div>
        </footer>
      </div>
    </article>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'

export default defineComponent({
  components: {
    AppLayout,
  },
})
</script>
