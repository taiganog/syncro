<script lang="ts">
  const semanticColors = [
    {
      label: 'Danger',
      description: 'Erros e ações destrutivas',
      shades: [
        { key: 'danger-dark', hex: '#9e0142', textDark: false },
        { key: 'danger',      hex: '#d8434e', textDark: false },
      ],
    },
    {
      label: 'Warning',
      description: 'Alertas moderados a graves',
      shades: [
        { key: 'warning-dark', hex: '#f67b4a', textDark: false },
        { key: 'warning',      hex: '#fdbf6f', textDark: true  },
      ],
    },
    {
      label: 'Caution',
      description: 'Atenção leve',
      shades: [
        { key: 'caution', hex: '#feeea2', textDark: true },
      ],
    },
    {
      label: 'Notice',
      description: 'Informação neutra',
      shades: [
        { key: 'notice', hex: '#f1f9a9', textDark: true },
      ],
    },
    {
      label: 'Success',
      description: 'Confirmações e conclusões',
      shades: [
        { key: 'success-light', hex: '#bfe5a0', textDark: true  },
        { key: 'success',       hex: '#75c8a5', textDark: true  },
      ],
    },
    {
      label: 'Info',
      description: 'Informativo',
      shades: [
        { key: 'info', hex: '#388eba', textDark: false },
      ],
    },
    {
      label: 'Accent',
      description: 'Ação secundária / destaque',
      shades: [
        { key: 'accent', hex: '#5e4fa2', textDark: false },
      ],
    },
  ];

  const primaryShades = [
    { shade: '50',  hex: '#f6f6fa', textDark: true  },
    { shade: '100', hex: '#eeeef4', textDark: true  },
    { shade: '200', hex: '#d9d9e8', textDark: true  },
    { shade: '300', hex: '#b8b8d0', textDark: true  },
    { shade: '400', hex: '#9090b2', textDark: false },
    { shade: '500', hex: '#70708e', textDark: false },
    { shade: '600', hex: '#585872', textDark: false },
    { shade: '700', hex: '#46465c', textDark: false },
    { shade: '800', hex: '#3b3b4e', textDark: false },
    { shade: '900', hex: '#333344', textDark: false },
    { shade: '950', hex: '#1e1e2c', textDark: false },
  ];

  const allPaletteColors = [
    '#9e0142','#d8434e','#f67b4a','#fdbf6f','#feeea2',
    '#f1f9a9','#bfe5a0','#75c8a5','#388eba','#5e4fa2',
  ];
</script>

<div class="min-h-screen bg-[#f6f6fa] text-[#1e1e2c] font-sans">

  <!-- Header -->
  <header class="bg-[#1e1e2c] text-white px-8 py-10">
    <p class="text-xs font-mono tracking-widest text-[#9090b2] uppercase mb-2">Syncro · Design System</p>
    <h1 class="text-3xl font-bold tracking-tight">Tailwind Config</h1>
    <p class="mt-1 text-[#b8b8d0] text-sm">Visão completa da paleta de cores e configurações do projeto.</p>

    <!-- Paleta completa em sequência -->
    <div class="mt-6 flex rounded-lg overflow-hidden h-8 w-full max-w-lg">
      {#each allPaletteColors as hex}
        <div class="flex-1" style="background:{hex}" title={hex}></div>
      {/each}
    </div>
    <p class="mt-2 text-xs text-[#9090b2] font-mono">paleta base — espectro danger → accent</p>
  </header>

  <main class="px-8 py-10 max-w-5xl mx-auto space-y-14">

    <!-- ── Cores Semânticas ── -->
    <section>
      <h2 class="text-xs font-mono tracking-widest uppercase text-[#70708e] mb-6">Cores Semânticas</h2>

      <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        {#each semanticColors as group}
          <div class="rounded-xl overflow-hidden border border-[#d9d9e8] bg-white shadow-sm">
            <!-- swatches -->
            <div class="flex h-20">
              {#each group.shades as swatch}
                <div
                  class="flex-1 flex flex-col justify-end p-2"
                  style="background:{swatch.hex}"
                >
                  <span
                    class="font-mono text-[10px] leading-tight"
                    style="color:{swatch.textDark ? 'rgba(0,0,0,0.55)' : 'rgba(255,255,255,0.75)'}"
                  >
                    {swatch.hex}
                  </span>
                </div>
              {/each}
            </div>

            <!-- info -->
            <div class="p-3">
              <p class="font-semibold text-sm">{group.label}</p>
              <p class="text-xs text-[#70708e] mt-0.5">{group.description}</p>
              <div class="mt-2 flex flex-wrap gap-1">
                {#each group.shades as swatch}
                  <code class="text-[10px] bg-[#eeeef4] text-[#585872] px-1.5 py-0.5 rounded">
                    bg-{swatch.key}
                  </code>
                {/each}
              </div>
            </div>
          </div>
        {/each}
      </div>
    </section>

    <!-- ── Primary (gray scale) ── -->
    <section>
      <h2 class="text-xs font-mono tracking-widest uppercase text-[#70708e] mb-6">
        Primary <span class="normal-case font-normal text-[#9090b2]">— cinza com subtom violeta</span>
      </h2>

      <div class="rounded-xl overflow-hidden border border-[#d9d9e8] shadow-sm">
        <!-- gradient bar -->
        <div class="flex h-12">
          {#each primaryShades as s}
            <div class="flex-1" style="background:{s.hex}"></div>
          {/each}
        </div>

        <!-- shade rows -->
        <div class="divide-y divide-[#eeeef4]">
          {#each primaryShades as s}
            <div class="flex items-center gap-4 px-4 py-2 bg-white hover:bg-[#f6f6fa] transition-colors">
              <div class="w-8 h-8 rounded-md shrink-0 border border-[#d9d9e8]" style="background:{s.hex}"></div>
              <code class="text-xs text-[#585872] w-24 shrink-0">primary-{s.shade}</code>
              <code class="text-xs text-[#9090b2] font-mono">{s.hex}</code>
              <div class="ml-auto flex gap-1">
                <code class="text-[10px] bg-[#eeeef4] text-[#585872] px-1.5 py-0.5 rounded">bg-primary-{s.shade}</code>
                <code class="text-[10px] bg-[#eeeef4] text-[#585872] px-1.5 py-0.5 rounded">text-primary-{s.shade}</code>
              </div>
            </div>
          {/each}
        </div>
      </div>
    </section>

    <!-- ── Exemplos de Uso ── -->
    <section>
      <h2 class="text-xs font-mono tracking-widest uppercase text-[#70708e] mb-6">Exemplos de Uso</h2>

      <div class="space-y-3">
        {#each [
          { key: 'danger',  hex: '#d8434e', border: '#9e0142', bg: '#fff5f5', label: 'Danger',  msg: 'Ocorreu um erro ao processar a solicitação.' },
          { key: 'warning', hex: '#f67b4a', border: '#fdbf6f', bg: '#fffbf0', label: 'Warning', msg: 'Atenção: esta ação pode ter consequências.' },
          { key: 'success', hex: '#75c8a5', border: '#bfe5a0', bg: '#f2fbf7', label: 'Success', msg: 'Operação concluída com sucesso.' },
          { key: 'info',    hex: '#388eba', border: '#388eba', bg: '#f0f7fd', label: 'Info',    msg: 'Novas atualizações estão disponíveis.' },
        ] as alert}
          <div
            class="flex items-start gap-3 rounded-lg px-4 py-3 border-l-4 text-sm"
            style="background:{alert.bg}; border-color:{alert.hex}"
          >
            <span class="font-semibold mt-0.5 shrink-0" style="color:{alert.hex}">{alert.label}</span>
            <span class="text-[#46465c]">{alert.msg}</span>
          </div>
        {/each}
      </div>
    </section>

    <!-- ── Tokens de Config ── -->
    <section>
      <h2 class="text-xs font-mono tracking-widest uppercase text-[#70708e] mb-4">tailwind.config.js</h2>
      <pre class="rounded-xl bg-[#1e1e2c] text-[#d9d9e8] text-xs p-6 overflow-x-auto leading-relaxed"><code>{`// web/tailwind.config.js
module.exports = {
  theme: {
    extend: {
      colors: {
        primary: { 50:'#f6f6fa', 100:'#eeeef4', 200:'#d9d9e8', 300:'#b8b8d0',
                   400:'#9090b2', 500:'#70708e', 600:'#585872', 700:'#46465c',
                   800:'#3b3b4e', 900:'#333344', 950:'#1e1e2c' },

        danger:  { DEFAULT:'#d8434e', dark:'#9e0142' },
        warning: { DEFAULT:'#fdbf6f', dark:'#f67b4a' },
        caution: '#feeea2',
        notice:  '#f1f9a9',
        success: { DEFAULT:'#75c8a5', light:'#bfe5a0' },
        info:    '#388eba',
        accent:  '#5e4fa2',
      },
    },
  },
}`}</code></pre>
    </section>

  </main>

  <footer class="text-center py-6 text-xs text-[#9090b2] font-mono">
    /tailwind · syncro design system
  </footer>

</div>
