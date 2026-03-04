<script lang="ts">
	import { Paperclip } from '@lucide/svelte';

	interface Props {
		label?: string;
		error?: string;
		name?: string;
		accept?: string;
		multiple?: boolean;
		required?: boolean;
		disabled?: boolean;
		class?: string;
		onchange?: (e: Event & { currentTarget: HTMLInputElement }) => void;
		[key: string]: unknown;
	}

	let {
		label,
		error,
		multiple = false,
		class: className = '',
		...rest
	}: Props = $props();
</script>

<div class="flex flex-col gap-1 {className}">
	{#if label}
		<span class="block text-sm font-medium text-surface-700 dark:text-surface-300">{label}</span>
	{/if}
	<label
		class="flex items-center gap-2 w-full px-3 py-2 rounded-lg text-sm transition-colors cursor-pointer
			bg-surface-50 dark:bg-surface-900
			{error
				? 'border border-error-400 dark:border-error-500'
				: 'border border-surface-300 dark:border-surface-700'}
			hover:bg-surface-100 dark:hover:bg-surface-800
			has-focus:ring-2 has:focus:ring-primary-500 dark:has-focus:ring-primary-400 has-focus:border-transparent"
	>
		<Paperclip class="w-4 h-4 shrink-0 text-surface-400 dark:text-surface-500" stroke-width={1.75} />
		<input
			type="file"
			{multiple}
			class="sr-only"
			{...rest}
		/>
		<span class="text-surface-500 dark:text-surface-400 truncate">
			{multiple ? 'Escolher arquivos…' : 'Escolher arquivo…'}
		</span>
	</label>
	{#if error}
		<span class="block text-xs text-error-600 dark:text-error-400">{error}</span>
	{/if}
</div>
