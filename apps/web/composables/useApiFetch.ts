const useApiFetch = <T>(path: string, options = {}) => {
    const config = useRuntimeConfig();
    return useFetch<{ data: T[] }>(path, {
        ...options,
        baseURL: config.public.apiUrl,
    });
}

export default useApiFetch;