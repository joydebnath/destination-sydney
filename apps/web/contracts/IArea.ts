import { IFilterOption } from "./IFilterOption";

export interface IArea extends IFilterOption {
    code: string;
    type: string;
    state: string;
    selected?: boolean;
}