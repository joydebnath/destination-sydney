const useApiFetch = <T>(path: string, options = {}) => {
    const config = useRuntimeConfig();
    return useLazyFetch<{ data: T[] }>(path, {
        ...options,
        baseURL: config.public.apiUrl,
    });
}

export default useApiFetch;