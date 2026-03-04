<script lang="ts">
	import { goto } from '$app/navigation';
	import { login, isAuthenticated } from '$lib/auth';
	import { onMount } from 'svelte';

	let email = $state('');
	let password = $state('');
	let error = $state('');
	let loading = $state(false);

	onMount(() => {
		if (isAuthenticated()) {
			goto('/admin/dashboard');
		}
	});

	async function handleSubmit(e: Event) {
		e.preventDefault();
		loading = true;
		error = '';

		try {
			await login(email, password);
			goto('/admin/dashboard');
		} catch (err: unknown) {
			error = err instanceof Error ? err.message : 'Erro ao realizar login';
		} finally {
			loading = false;
		}
	}
</script>

<div class="min-h-screen bg-gray-50 flex items-center justify-center">
	<div class="w-full max-w-sm bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
		<h1 class="text-2xl font-semibold text-gray-900 mb-1">Entrar</h1>
		<p class="text-sm text-gray-500 mb-6">Acesse sua conta para continuar</p>

		<form onsubmit={handleSubmit} class="space-y-4">
			<div>
				<label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
				<input
					id="email"
					type="email"
					bind:value={email}
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
					type="password"
					bind:value={password}
					required
					autocomplete="current-password"
					placeholder="••••••••"
					class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
				/>
			</div>

			{#if error}
				<p class="text-sm text-red-600 bg-red-50 border border-red-200 rounded-lg px-3 py-2">
					{error}
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
