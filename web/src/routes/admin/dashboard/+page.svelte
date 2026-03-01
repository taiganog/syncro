<script lang="ts">
	import { onMount } from 'svelte';
	import { goto } from '$app/navigation';
	import { isAuthenticated, logout } from '$lib/auth';

	onMount(() => {
		if (!isAuthenticated()) {
			goto('/login');
		}
	});

	function handleLogout() {
		logout();
		goto('/login');
	}
</script>

<div class="min-h-screen bg-gray-50">
	<header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
		<h1 class="text-lg font-semibold text-gray-900">Dashboard</h1>
		<button
			onclick={handleLogout}
			class="text-sm text-gray-500 hover:text-gray-900 transition-colors"
		>
			Sair
		</button>
	</header>

	<main class="p-6">
		<p class="text-gray-600">Bem-vindo ao painel administrativo.</p>
	</main>
</div>
