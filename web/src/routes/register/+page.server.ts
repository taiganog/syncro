import { fail, redirect } from '@sveltejs/kit';
import type { Actions, PageServerLoad } from './$types';
import { api } from '$lib/server/api';

export const actions: Actions = {
    default: async ({ request, cookies }) => {
        const data = await request.formData();
        const name = data.get('name');
        const email = data.get('email');
        const password = data.get('password');

        const response = await api('/register', {
            method: 'POST',
            body: { email, password, name }
        });

        const body = await response.json();

        if (!response.ok) {
            return fail(401, { error: body.error || 'Dados Inválidos', email });
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
