import { API_URL } from '$env/static/private';

type Method = 'GET' | 'POST' | 'PUT' | 'PATCH' | 'DELETE';

interface RequestOptions extends Omit<RequestInit, 'method' | 'body' | 'headers'> {
	method?: Method;
	body?: unknown;
	headers?: Record<string, string>;
	token?: string;
}

export async function api(endpoint: string, options: RequestOptions = {}): Promise<Response> {
	const { method = 'GET', body, headers, token, ...rest } = options;

	const path = endpoint.startsWith('/') ? endpoint : `/${endpoint}`;

	const requestHeaders: Record<string, string> = {
		'Content-Type': 'application/json',
		...headers
	};

	if (token) {
		requestHeaders['Authorization'] = `Bearer ${token}`;
	}

	return fetch(`${API_URL}${path}`, {
		method,
		headers: requestHeaders,
		body: body !== undefined ? JSON.stringify(body) : undefined,
		...rest
	});
}
