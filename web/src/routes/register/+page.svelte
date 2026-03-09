<script lang="ts">
	import { enhance } from '$app/forms';
	import type { ActionData } from './$types';
	import DarkModeToggle from '$lib/components/DarkModeToggle.svelte';
	import { Input } from '$lib';

	let { form }: { form: ActionData } = $props();

	let loading = $state(false);
</script>

<div class="relative min-h-screen bg-surface-100 dark:bg-surface-900 flex items-center justify-center">
	<div class="absolute top-4 right-4">
		<DarkModeToggle />
	</div>

	<div class="w-full max-w-sm bg-surface-50 dark:bg-surface-950 rounded-2xl shadow-sm border border-surface-200 dark:border-surface-800 p-8">
		<h1 class="text-2xl font-semibold text-surface-950 dark:text-surface-50 mb-1">Insira seus dados</h1>
		<p class="text-sm text-surface-500 dark:text-surface-400 mb-6">Crie sua conta para continuar</p>

		<form
			method="POST"
			class="space-y-4"
			use:enhance={() => {
				loading = true;
				return async ({ update }) => {
					loading = false;
					await update();
				};
			}}
		>
			<Input
				type="email"
				label="E-mail"
				name="email"
				placeholder="seu@email.com"
				required
			/>

			<Input
				type="password"
				label="Senha"
				name="password"
				placeholder="Insira sua senha"
				required
			/>

            <Input
				type="text"
				label="Nome"
				name="name"
				placeholder="Insira seu nome"
				required
			/>

            <Input
				type="text"
				label="Telefone"
				name="telefone"
				placeholder="Insira seu telefone"
                maxlength="11"
			/>

			{#if form?.error}
				<p class="text-sm text-error-700 dark:text-error-400 bg-error-50 dark:bg-error-950 border border-error-200 dark:border-error-800 rounded-lg px-3 py-2">
					{form.error}
				</p>
			{/if}

			<button
				type="submit"
				disabled={loading}
				class="w-full bg-primary-500 hover:bg-primary-600 disabled:bg-primary-300 dark:disabled:bg-primary-800 text-white font-medium py-2 px-4 rounded-lg text-sm transition-colors"
			>
				{loading ? 'Entrando...' : 'Entrar'}
			</button>
		</form>
	</div>
</div>
