<script lang="ts">
	import type { Snippet } from 'svelte';

	interface Props {
		label?: string;
		error?: string;
		value?: string[];
		name?: string;
		size?: number;
		required?: boolean;
		disabled?: boolean;
		class?: string;
		children?: Snippet;
		[key: string]: unknown;
	}

	let {
		label,
		error,
		value = $bindable([]),
		size = 4,
		class: className = '',
		children,
		...rest
	}: Props = $props();

	const base =
		'w-full px-3 py-2 rounded-lg text-sm transition-colors ' +
		'bg-surface-50 dark:bg-surface-900 ' +
		'text-surface-950 dark:text-surface-50 ' +
		'focus:outline-none focus:ring-2 focus:border-transparent ' +
		'disabled:opacity-50 disabled:cursor-not-allowed ' +
		'[&>option]:py-1 [&>option:checked]:bg-primary-100 dark:[&>option:checked]:bg-primary-900 ' +
		'[&>option:checked]:text-primary-700 dark:[&>option:checked]:text-primary-300 ';

	const borderClass = error
		? 'border border-error-400 dark:border-error-500 focus:ring-error-400 dark:focus:ring-error-500'
		: 'border border-surface-300 dark:border-surface-700 focus:ring-primary-500 dark:focus:ring-primary-400';
</script>

<label class="flex flex-col gap-1 {className}">
	{#if label}
		<span class="block text-sm font-medium text-surface-700 dark:text-surface-300">{label}</span>
	{/if}
	<select multiple bind:value {size} class="{base} {borderClass}" {...rest}>
		{@render children?.()}
	</select>
	{#if error}
		<span class="block text-xs text-error-600 dark:text-error-400">{error}</span>
	{:else}
		<span class="block text-xs text-surface-400 dark:text-surface-500">
			Segure Ctrl / ⌘ para selecionar múltiplos
		</span>
	{/if}
</label>
