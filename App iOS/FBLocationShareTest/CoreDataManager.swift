//
//  CoreDataManager.swift
//  FBLocationShareTest
//
//  Created by Kaiwei Lin on 4/05/2017.
//  Copyright © 2017 Kaiwei Lin. All rights reserved.
//

import UIKit
import CoreData

@available(iOS 10.0, *)
class CoreDataManager: NSObject {

    private class func getContext() -> NSManagedObjectContext{
        let appDelegate = UIApplication.shared.delegate as! AppDelegate
        return appDelegate.persistentContainer.viewContext

    }
    
    class func storeObj(phoneNo: String, contactName: String){
        let context = getContext()
        
        let entity = NSEntityDescription.entity(forEntityName: "Contact", in: context)
        
        let managedObj = NSManagedObject(entity: entity!, insertInto: context)
        
        managedObj.setValue(phoneNo, forKey: "phoneNo")
        managedObj.setValue(contactName, forKey: "contactName")
        
        do{
            try context.save()
            print("save")
        }catch{
            print(error.localizedDescription)
        }
    }
    
    class func fetchObj() -> contactItem{
            
            var contact = [Contact]()
            var item = contactItem()
            let fetchRequest = NSFetchRequest<NSFetchRequestResult>(entityName: "Contact")
        
            do{
                let fetchResult = try getContext().fetch(fetchRequest)
                //print(fetchResult)
                let results = fetchResult as! [Contact]
                item = contactItem(contactName: results[results.count-1].contactName!, phoneNo: results[results.count-1].phoneNo!)
                
            
            }catch let error as NSError {
                print("Could not fetch. \(error), \(error.userInfo)")
            
            }
            return item
         
    }
    
    struct contactItem{
        var contactName:String?
        var phoneNo:String?
        
        init(){
            contactName = ""
            phoneNo = ""
        }
        
        init(contactName:String, phoneNo:String){
            self.contactName = contactName
            self.phoneNo = phoneNo
        }
    }
    
}
