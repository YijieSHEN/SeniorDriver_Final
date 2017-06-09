//
//  UUIDStore.swift
//  FBLocationShareTest
//
//  Created by Kaiwei Lin on 4/04/2017.
//  Copyright © 2017 Kaiwei Lin. All rights reserved.
//

import Foundation
import Firebase
import FirebaseDatabase
import KeychainSwift

let DB_BASE = FIRDatabase.database().reference()

class UUIDStore{
    private var _keyChain = KeychainSwift()
    private var _refDatabase = DB_BASE
    
    var keyChain: KeychainSwift{
        get{
            return _keyChain
        }set{
            _keyChain = newValue
        }
    }
    
}
