//
//  TrackingViewController.swift
//  FBLocationShareTest
//
//  Created by Kaiwei Lin on 24/03/2017.
//  Copyright © 2017 Kaiwei Lin. All rights reserved.
//

import UIKit
import CoreLocation
import MapKit
import Firebase
import FirebaseAuth
import MessageUI
import UserNotifications
import ContactsUI
import CoreData


class TrackingViewController: UIViewController,CLLocationManagerDelegate,MKMapViewDelegate,MFMessageComposeViewControllerDelegate, CNContactPickerDelegate{
    
    
    @IBOutlet weak var ShareLocBtn: UIButton!
    
    var state: Bool = true
    //var rootRef = FIRDatabase.database().reference(fromURL: "https://locationshare-52ba8.firebaseio.com/")
    var rootRef = FIRDatabase.database().reference(fromURL: "https://seniortracker.firebaseio.com/")
    var uid:String = ""
    var mapId: String = ""
    
    let manager = CLLocationManager()
    var myLocations: [CLLocation] = []
    var selectedPhone:[String] = [""]
    
    var timer = Timer()
    
    @IBOutlet weak var mapView: MKMapView!
    
    override func viewDidLoad() {
        super.viewDidLoad()

        
        // animation for advicing the user that this button is clickable
        delay(2.5){
            self.ShareLocBtn.shake()
        }
        
        // Do any additional setup after loading the view.
        timer = Timer.scheduledTimer(timeInterval: 2.5, target: self, selector: #selector(timerAction), userInfo: nil, repeats: true)
        
        let keyChain = UUIDStore().keyChain
        print("keychain: \(keyChain)")
        
        if keyChain.get("uid") == nil {
            keyChain.set(UUID().uuidString, forKey: "uid")
        }
        
        FIRAuth.auth()?.signInAnonymously(completion: { (FIRUser, NSError) in
            if NSError != nil {
                print(NSError)
            } else {
                self.uid = keyChain.get("uid")!
            }
        })
        
        
        mapId = UUID().uuidString
        
        manager.delegate = self
        manager.desiredAccuracy = kCLLocationAccuracyBest
        manager.requestWhenInUseAuthorization()
        
        //mapview setup to show user location
        mapView.delegate = self
        mapView.showsUserLocation = true
        mapView.mapType = MKMapType(rawValue: 0)!
        mapView.userTrackingMode = MKUserTrackingMode(rawValue: 2)!
        
        /*let email:String = "kaiweilin927@gmail.com"
        let password: String = "Lkw7811178"
        
        FIRAuth.auth()?.signIn(withEmail: email, password: password, completion: { (FIRUser, NSError) in
            if NSError == nil {
                self.uid = FIRUser!.uid
            } else {
                FIRAuth.auth()?.createUser(withEmail: email, password: password, completion: { (FIRUser, NSError) in
                    if NSError == nil {
                        self.uid = FIRUser!.uid
                        print("uid:  \(self.uid)");
                    } else {
                        
                        print("can't sign in")
                    }
                    
                })
            }
        })*/
        
         // Do any additional setup after loading the view.
    }

    
    /*@IBAction func SendMessage(_ sender: UIButton) {

        let messageVC = MFMessageComposeViewController()
        messageVC.body = "http://www.seniordriver.tk/index.php/Tracking/map/\(self.uid)/\(self.mapId)"
        messageVC.messageComposeDelegate = self
        
        self.present(messageVC, animated: true, completion: nil)
    }*/

    
    @IBAction func ShareLocation(_ sender: UIButton) {
        
        
        if (ShareLocBtn.titleLabel?.text=="  Share My Location  "){

            
            
            
            let cnPicker = CNContactPickerViewController()
            cnPicker.delegate = self
            self.present(cnPicker, animated: true, completion: nil)
            
            
            /*let messageVC = MFMessageComposeViewController()
            
            messageVC.body = "http://www.seniordriver.tk/index.php/Tracking/map/\(self.uid)/\(self.mapId)"
            messageVC.messageComposeDelegate = self
            messageVC.recipients = [CoreDataManager.fetchObj().phoneNo!]
            self.present(messageVC, animated: true, completion: nil)*/
            
            /*self.rootRef.keepSynced(true)
            self.manager.startUpdatingLocation()
            ShareLocBtn.setTitle("Stop Sharing", for: .normal )*/
            
            /*var alertController = UIAlertController(title: "Start sharing", message: "We will generate an URL in the body of message for you, please choose the receiver from the Contacts and then send it!", preferredStyle: UIAlertControllerStyle.alert)
            
            alertController.addAction(UIAlertAction(title: "OK", style: .default, handler: { action in
                
                //run your function here
                self.rootRef.keepSynced(true)
                self.manager.startUpdatingLocation()
                
                let messageVC = MFMessageComposeViewController()
                
                messageVC.body = "Hi, this is message from SeniorDriver.tk. Your family member is sharing location with you, please click the following link to view. http://www.seniordriver.tk/index.php/Tracking/map/\(self.uid)/\(self.mapId)"
                messageVC.messageComposeDelegate = self
                self.present(messageVC, animated: true, completion: nil)
            }))
            
            alertController.addAction(UIAlertAction(title: "Cancel", style: .default, handler: { action in
                alertController.dismiss(animated: true, completion:nil)

                }))
            
            self.present(alertController, animated: true, completion: nil)
            
            let messageVC = MFMessageComposeViewController()
            
            messageVC.body = "http://www.seniordriver.tk/index.php/Tracking/map/\(self.uid)/\(self.mapId)"
            messageVC.messageComposeDelegate = self
            self.present(messageVC, animated: true, completion: nil)*/
            
            

        }else{
            
            manager.stopUpdatingLocation()
            //mapView.showsUserLocation = false
            ShareLocBtn.setTitle("  Share My Location  ", for: .normal )
            
            var alertController = UIAlertController(title: "Stop sharing", message: "Do you want to clear this sharing history ?", preferredStyle: UIAlertControllerStyle.alert)
            
            alertController.addAction(UIAlertAction(title: "OK", style: .default, handler: { action in

            self.rootRef.child("uid: \(self.uid)").child("mapId: \(self.mapId)").removeValue { (error, ref) in
                if error != nil {
                    print("error \(error)")
                }else{
                    Alert.show(title: "", message: "Deleted Successfully!", vc: self)
                }
            }
            self.rootRef.keepSynced(false)
            
           }))
            
            alertController.addAction(UIAlertAction(title: "No, keep it.", style: .default, handler: { action in
                alertController.dismiss(animated: true, completion:nil)
                
            }))
            
            self.present(alertController, animated: true, completion: nil)

        }

    

    }

    func messageComposeViewController(_ controller: MFMessageComposeViewController, didFinishWith result: MessageComposeResult) {
        
        switch (result.rawValue) {
        case MessageComposeResult.cancelled.rawValue :
            
            rootRef.keepSynced(false)
            manager.stopUpdatingLocation()
            controller.dismiss(animated: true, completion: nil)
            Alert.show(title: "", message: "Message Canceled", vc: self)
            break

        case MessageComposeResult.failed.rawValue :
            
            rootRef.keepSynced(false)
            manager.stopUpdatingLocation()
            controller.dismiss(animated: true, completion: nil)
            Alert.show(title: "", message: "Message Failed", vc: self)
            break
            
        case MessageComposeResult.sent.rawValue :
            
            controller.dismiss(animated: true, completion: nil)
            Alert.show(title: "", message: "Message Sent", vc: self)
            self.rootRef.keepSynced(true)
            self.manager.startUpdatingLocation()
            ShareLocBtn.setTitle("Stop Sharing", for: .normal )
            break
            
        default:
            break
        }
        controller.dismiss(animated: true, completion: nil)
    }

    
    func pushToFirebase(_ lat:String,_ lon: String){
        let dateformatter = DateFormatter()
        dateformatter.dateFormat = "MM/dd/yy h:mm a Z"
        let msgData = [
            "latitude": lat,
            "longitude": lon,
            "timestamp": dateformatter.string(from: NSDate() as Date)
        ]
        rootRef.child("uid: \(uid)").child("mapId: \(mapId)").childByAutoId().setValue(msgData)
        //rootRef.childByAutoId().setValue(msgData)
        
       // print("uid:  \(self.uid)");
        
        
    }
    
    
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
    
    // MARK: - CLLocationManagerDelegate
    func locationManager(_ manager: CLLocationManager, didUpdateLocations locations: [CLLocation]) {
        let locaiton = locations[0]
        
        let span: MKCoordinateSpan = MKCoordinateSpanMake(0.007,0.007)
        let myLocation: CLLocationCoordinate2D = CLLocationCoordinate2DMake(locaiton.coordinate.latitude, locaiton.coordinate.longitude)
        let region:MKCoordinateRegion = MKCoordinateRegionMake(myLocation, span)
        mapView.setRegion(region, animated: true)
        self.mapView.showsUserLocation = true
        let lat: String = String(format:"%.15f", (manager.location?.coordinate.latitude)!)
        let long: String = String(format:"%.15f",(manager.location?.coordinate.longitude)!)
        
        self.pushToFirebase("\(lat)","\(long)")
        


        rootRef.child("uid: \(uid)").child("mapId: \(mapId)").queryOrderedByKey().observe(.childAdded, with: {
            snap in
            let latText = (snap.value as AnyObject).object(forKey: "latitude") as! String
            let longText = (snap.value as AnyObject).object(forKey: "longitude") as! String
            print("mapid: \(self.mapId), lat: \(latText), long: \(longText)")
        }
        )
        
        
        myLocations.append(locations[0] as CLLocation)
        if (myLocations.count > 1){
            let sourceIndex = myLocations.count - 1
            let destinationIndex = myLocations.count - 2
            let c1 = myLocations[sourceIndex].coordinate
            let c2 = myLocations[destinationIndex].coordinate
            var a = [c1, c2]
            let polyline = MKPolyline(coordinates: &a, count: a.count)
            mapView.add(polyline)
        }

    }
    
    func mapView(_ mapView: MKMapView, rendererFor overlay: MKOverlay) -> MKOverlayRenderer {
        
        if overlay is MKPolyline {
            let polylineRenderer = MKPolylineRenderer(overlay: overlay)
            polylineRenderer.strokeColor = UIColor.blue.withAlphaComponent(0.4)
            polylineRenderer.lineWidth = 4
            return polylineRenderer
        }
        return MKPolylineRenderer()
    }


    func delay(_ seconds: Double, completion: @escaping () -> ()) {
        DispatchQueue.main.asyncAfter(deadline: .now() + seconds) {
            completion()
        }
    }

    func timerAction(){
        self.ShareLocBtn.shake() // shake()
    }

    func contactPicker(_ picker: CNContactPickerViewController, didSelect contacts: [CNContact]) {
        contacts.forEach { contact in
            for number in contact.phoneNumbers {
                 //let selectedPhone = number.value
                 let selectedPhone = (number.value).value(forKey: "digits") as! String
                //let phoneNumber = number.value
                print("number is = \(selectedPhone)....\(contact.givenName) \(contact.familyName)")
                if #available(iOS 10.0, *) {
                    CoreDataManager.storeObj(phoneNo: "\(selectedPhone)",contactName: "\(contact.givenName) \(contact.familyName)")
                    print("name:\(CoreDataManager.fetchObj().contactName)")
                    print("phone:\(CoreDataManager.fetchObj().phoneNo)")
                } else {
                    // Fallback on earlier versions
                }
                
            }
        }
        picker.dismiss(animated: true, completion: nil)
        let messageVC = MFMessageComposeViewController()
        
        messageVC.body = "http://www.seniordriver.tk/index.php/Tracking/map/\(self.uid)/\(self.mapId)"
        messageVC.messageComposeDelegate = self
        if #available(iOS 10.0, *) {
            messageVC.recipients = [CoreDataManager.fetchObj().phoneNo!]
        } else {
            // Fallback on earlier versions
        }
        self.present(messageVC, animated: true, completion: nil)
    }
    
    func contactPickerDidCancel(_ picker: CNContactPickerViewController) {
        print("Cancel Contact Picker")
    }
    

}

extension UIView {
    func shake() {
        let animation = CAKeyframeAnimation(keyPath: "transform.translation.x")
        animation.timingFunction = CAMediaTimingFunction(name: kCAMediaTimingFunctionLinear)
        animation.duration = 0.7
        animation.values = [10.0, -10.0, -5.0, 5.0, -3.0, 0.0 ]
        layer.add(animation, forKey: "shake")
    }
}

