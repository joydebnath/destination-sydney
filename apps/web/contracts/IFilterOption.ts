export interface IFilterOption {
    id: string;
    name: string;
    selected?: boolean;
}

export interface IFilter {
    [key: string]: Array<IFilterOption>;
}