<script lang="ts">
	import { StatCard } from '$lib';
</script>

<div class="space-y-6">
	<div class="bg-surface-50 dark:bg-surface-900 border border-surface-200 dark:border-surface-700 rounded-xl p-6">
		<h2 class="text-base font-semibold text-surface-950 dark:text-surface-50 mb-1">Bem-vindo ao Syncro</h2>
		<p class="text-sm text-surface-500 dark:text-surface-400">Painel administrativo — visão geral do sistema.</p>
	</div>

	<div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
		<StatCard label="Usuários" />
		<StatCard label="Sessões ativas" />
		<StatCard label="Eventos hoje" />
	</div>
</div>
