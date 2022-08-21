/* eslint-disable prettier/prettier */

import ChangeRate from 'App/Models/ChangeRate'
import AppSetting from 'App/Models/Setting'

export const convertDataToObject = async (onlyData?:boolean) => {
  let data: AppSetting | null = await AppSetting.first()

  if (data) {
    if(onlyData){
      return JSON.parse(data.conversions)
    }
    data['convertions'] = JSON.parse(data.convertions)
  }
  return data
}

export const currencyConverter = async (amount: number, convertFrom: string, convertTo: string) => {
  const appSettings: any = await convertDataToObject()

  const convertion: any = [].concat(appSettings.convertions).filter((convertionItem: any) => {
    return (
      (convertionItem.from === convertFrom && convertionItem.to === convertTo) ||
      (convertionItem.from === convertTo && convertionItem.to === convertFrom)
    )
  })

  const result: any = convertion[0]

  let output: number = 0
  const change: number = result.val

  //ghs vers ghs c'est le même montant. pas de calcul
  if (result.from === result.to) {
    return amount
  }

  //si la convertion est directe(selon l'ordre de l'enregistrement) on multiplie
  if (result.from === convertFrom) {
    output = (amount * change);
  } else {
    output = (amount / change);
  }

  return output
}

export const getChangeRateValue = async (amount: number) => {
  const rate: ChangeRate | null = await ChangeRate.query().where('end', '>=', amount).first()

  return rate
}
