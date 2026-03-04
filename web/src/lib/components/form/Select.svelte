<script lang="ts">
	import type { Snippet } from 'svelte';

	interface Props {
		label?: string;
		error?: string;
		value?: string | number;
		name?: string;
		placeholder?: string;
		required?: boolean;
		disabled?: boolean;
		class?: string;
		children?: Snippet;
		[key: string]: unknown;
	}

	let {
		label,
		error,
		value = $bindable(),
		placeholder,
		class: className = '',
		children,
		...rest
	}: Props = $props();

	const base =
		'w-full px-3 py-2 rounded-lg text-sm transition-colors ' +
		'bg-surface-50 dark:bg-surface-900 ' +
		'text-surface-950 dark:text-surface-50 ' +
		'focus:outline-none focus:ring-2 focus:border-transparent ' +
		'disabled:opacity-50 disabled:cursor-not-allowed ';

	const borderClass = error
		? 'border border-error-400 dark:border-error-500 focus:ring-error-400 dark:focus:ring-error-500'
		: 'border border-surface-300 dark:border-surface-700 focus:ring-primary-500 dark:focus:ring-primary-400';
</script>

<label class="flex flex-col gap-1 {className}">
	{#if label}
		<span class="block text-sm font-medium text-surface-700 dark:text-surface-300">{label}</span>
	{/if}
	<select bind:value class="{base} {borderClass}" {...rest}>
		{#if placeholder}
			<option value="" disabled selected={!value}>{placeholder}</option>
		{/if}
		{@render children?.()}
	</select>
	{#if error}
		<span class="block text-xs text-error-600 dark:text-error-400">{error}</span>
	{/if}
</label>
