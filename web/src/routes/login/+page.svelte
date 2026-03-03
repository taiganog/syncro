<script lang="ts">
	import { enhance } from '$app/forms';
	import type { ActionData } from './$types';

	let { form }: { form: ActionData } = $props();

	let loading = $state(false);
</script>

<div class="min-h-screen bg-gray-50 flex items-center justify-center">
	<div class="w-full max-w-sm bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
		<h1 class="text-2xl font-semibold text-gray-900 mb-1">Entrar</h1>
		<p class="text-sm text-gray-500 mb-6">Acesse sua conta para continuar</p>

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
			<div>
				<label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
				<input
					id="email"
					name="email"
					type="email"
					value={form?.email ?? ''}
					required
					autocomplete="email"
					placeholder="seu@email.com"
					class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
				/>
			</div>

			<div>
				<label for="password" class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
				<input
					id="password"
					name="password"
					type="password"
					required
					autocomplete="current-password"
					placeholder="••••••••"
					class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
				/>
			</div>

			{#if form?.error}
				<p class="text-sm text-red-600 bg-red-50 border border-red-200 rounded-lg px-3 py-2">
					{form.error}
				</p>
			{/if}

			<button
				type="submit"
				disabled={loading}
				class="w-full bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 text-white font-medium py-2 px-4 rounded-lg text-sm transition-colors"
			>
				{loading ? 'Entrando...' : 'Entrar'}
			</button>
		</form>
	</div>
</div>
