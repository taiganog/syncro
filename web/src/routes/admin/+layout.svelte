<script lang="ts">
	import { page } from '$app/stores';
	import { enhance } from '$app/forms';

	import { House, LogOut, BookMarked } from '@lucide/svelte';
	import DarkModeToggle from '$lib/components/DarkModeToggle.svelte';

	const navItems: { href: string; label: string; icon: typeof House }[] = [
		{ href: '/admin/dashboard',     label: 'Dashboard',     icon: House },
        { href: '/admin/eventos',       label: 'Eventos',       icon: BookMarked }
	];

	$: currentPath = $page.url.pathname;
</script>

<div class="flex min-h-screen bg-surface-100 dark:bg-surface-900">
	<aside class="w-64 bg-surface-50 dark:bg-surface-950 border-r border-surface-200 dark:border-surface-800 flex flex-col">
		<div class="px-6 py-5 border-b border-surface-200 dark:border-surface-800">
			<span class="text-xl font-bold text-surface-950 dark:text-surface-50">Syncro</span>
			<span class="ml-2 text-xs font-medium text-surface-400 dark:text-surface-500 uppercase tracking-widest">Admin</span>
		</div>

		<nav class="flex-1 px-3 py-4 space-y-1">
			{#each navItems as item}
				<a
					href={item.href}
					class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors
						{currentPath === item.href
						? 'bg-primary-100 dark:bg-primary-950 text-primary-700 dark:text-primary-300'
						: 'text-surface-600 dark:text-surface-400 hover:bg-surface-100 dark:hover:bg-surface-800 hover:text-surface-950 dark:hover:text-surface-50'}"
				>
					<svelte:component this={item.icon} class="w-5 h-5 shrink-0" stroke-width={1.75} />
					{item.label}
				</a>
			{/each}
		</nav>

		<div class="px-3 py-4 border-t border-surface-200 dark:border-surface-800">
			<form method="POST" action="/admin/logout" use:enhance>
				<button
					type="submit"
					class="flex items-center gap-3 w-full px-3 py-2 rounded-md text-sm font-medium text-surface-600 dark:text-surface-400 hover:bg-surface-100 dark:hover:bg-surface-800 hover:text-surface-950 dark:hover:text-surface-50 transition-colors"
				>
					<LogOut class="w-5 h-5 shrink-0" stroke-width={1.75} />
					Sair
				</button>
			</form>
		</div>
	</aside>

	<div class="flex-1 flex flex-col min-w-0">
		<header class="bg-surface-50 dark:bg-surface-900 border-b border-surface-200 dark:border-surface-800 px-6 py-5 flex items-center justify-between">
			<h1 class="text-lg font-semibold text-surface-950 dark:text-surface-50">
				{navItems.find((i) => i.href === currentPath)?.label ?? 'Admin'}
			</h1>
			<DarkModeToggle />
		</header>

		<main class="flex-1 p-6">
			<slot />
		</main>
	</div>
</div>
