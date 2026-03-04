<script lang="ts">
	interface Props {
		label: string;
		value?: string;
	}

	let { label, value = '—' }: Props = $props();
</script>

<div class="bg-surface-50 dark:bg-surface-900 border border-surface-200 dark:border-surface-700 rounded-xl p-5">
	<p class="text-xs font-medium text-surface-500 dark:text-surface-400 uppercase tracking-wide">{label}</p>
	<p class="text-2xl font-bold text-surface-950 dark:text-surface-50 mt-1">{value}</p>
</div>
