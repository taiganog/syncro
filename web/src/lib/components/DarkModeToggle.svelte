<script lang="ts">
	import { Sun, Moon } from '@lucide/svelte';
	import { browser } from '$app/environment';

	let dark = $state(browser ? document.documentElement.classList.contains('dark') : false);

	function toggle() {
		dark = !dark;
		document.documentElement.classList.toggle('dark', dark);
		localStorage.setItem('theme', dark ? 'dark' : 'light');
	}
</script>

<button
	onclick={toggle}
	aria-label={dark ? 'Ativar modo claro' : 'Ativar modo escuro'}
	class="p-2 rounded-lg text-surface-600 hover:bg-surface-200 hover:text-surface-950 transition-colors"
>
	{#if dark}
		<Sun class="w-4 h-4" stroke-width={1.75} />
	{:else}
		<Moon class="w-4 h-4" stroke-width={1.75} />
	{/if}
</button>
