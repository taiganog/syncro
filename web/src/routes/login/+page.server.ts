import { fail, redirect } from '@sveltejs/kit';
import type { Actions, PageServerLoad } from './$types';
import { api } from '$lib/server/api';

export const load: PageServerLoad = async ({ cookies }) => {
	if (cookies.get('token')) {
		redirect(302, '/admin/dashboard');
	}
};

export const actions: Actions = {
	default: async ({ request, cookies }) => {
		const data = await request.formData();
		const email = data.get('email');
		const password = data.get('password');

		const response = await api('/auth/login', {
			method: 'POST',
			body: { email, password }
		});

		const body = await response.json();

		if (!response.ok) {
			return fail(401, { error: body.error || 'Credenciais inválidas', email });
		}

		cookies.set('token', body.access_token, {
			path: '/',
			httpOnly: true,
			sameSite: 'strict',
			maxAge: 60 * 60 * 24 * 7 // 7 dias
		});

		redirect(302, '/admin/dashboard');
	}
};
