const API_URL = 'http://127.0.0.1:8000/api';

export async function login(email: string, password: string): Promise<void> {
	const response = await fetch(`${API_URL}/auth/login`, {
		method: 'POST',
		headers: { 'Content-Type': 'application/json' },
		body: JSON.stringify({ email, password })
	});

	const data = await response.json();

	if (!response.ok) {
		throw new Error(data.error || 'Credenciais inválidas');
	}

	localStorage.setItem('token', data.access_token);
}

export function logout(): void {
	localStorage.removeItem('token');
}

export function getToken(): string | null {
	if (typeof localStorage === 'undefined') return null;
	return localStorage.getItem('token');
}

export function isAuthenticated(): boolean {
	return !!getToken();
}
