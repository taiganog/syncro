<script lang="ts">
	import { page } from '$app/stores';
	import { enhance } from '$app/forms';

	const navItems = [
		{ href: '/admin/dashboard', label: 'Dashboard', icon: 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6' }
	];

	$: currentPath = $page.url.pathname;
</script>

<div class="flex min-h-screen bg-gray-50">
	<aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
		<div class="px-6 py-5 border-b border-gray-200">
			<span class="text-xl font-bold text-gray-900">Syncro</span>
			<span class="ml-2 text-xs font-medium text-gray-400 uppercase tracking-widest">Admin</span>
		</div>

		<nav class="flex-1 px-3 py-4 space-y-1">
			{#each navItems as item}
				<a
					href={item.href}
					class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium transition-colors
						{currentPath === item.href
						? 'bg-gray-100 text-gray-900'
						: 'text-gray-600 hover:bg-gray-50 hover:text-gray-900'}"
				>
					<svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" d={item.icon} />
					</svg>
					{item.label}
				</a>
			{/each}
		</nav>

		<div class="px-3 py-4 border-t border-gray-200">
			<form method="POST" action="/admin/dashboard?/logout" use:enhance>
				<button
					type="submit"
					class="flex items-center gap-3 w-full px-3 py-2 rounded-md text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors"
				>
					<svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
					</svg>
					Sair
				</button>
			</form>
		</div>
	</aside>

	<div class="flex-1 flex flex-col min-w-0">
		<header class="bg-white border-b border-gray-200 px-6 py-4">
			<h1 class="text-lg font-semibold text-gray-900">
				{navItems.find((i) => i.href === currentPath)?.label ?? 'Admin'}
			</h1>
		</header>

		<main class="flex-1 p-6">
			<slot />
		</main>
	</div>
</div>
