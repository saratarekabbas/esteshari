let APP_ID = "553192289a664c94b02e9a08371e7ffb"
let token = null;
let uid = String(Math.floor(Math.random() * 10000))

let client;
let channel;

let localStream;
let remoteStream;
let peerConnection;

const servers = {
    iceServers: [
        {
            urls: ['stun:stun1.l.google.com:19302', 'stun:stun2.l.google.com:19302'] //Google Stun Servers
        }
    ]
}

let init = async () => {
    client = await AgoraRTM.createInstance(APP_ID)
    await client.login({uid, token})

    channel = client.createChannel('main') //later this needs to be a dynamic room id
    await channel.join()

    channel.on('MemberJoined', handleUserJoined)

    client.on('MessageFromPeer', handleMessageFromPeer)

    localStream = await navigator.mediaDevices.getUserMedia({video: true, audio: false})
    document.getElementById('user-1').srcObject = localStream
}

let handleMessageFromPeer = async (message, MemberId) => {
    message = JSON.parse(message.text)
    console.log('Message:', message)
}

let handleUserJoined = async (MemberId) => {
    console.log('A new user joined the channel: ', MemberId)
    createOffer(MemberId)
}

let createPeerConnection = async (MemberId) => {
    peerConnection = new RTCPeerConnection(servers)

    remoteStream = new MediaStream()
    document.getElementById('user-2').srcObject = remoteStream

    if (!localStream) {
        localStream = await navigator.mediaDevices.getUserMedia({video: true, audio: false})
        document.getElementById('user-1').srcObject = localStream
    }

    localStream.getTracks().forEach((track) => {
        peerConnection.addTrack(track, localStream)
    })

    peerConnection.ontrack = (event) => {
        event.streams[0].getTracks().forEach((track) => {
            remoteStream.addTrack(track)
        })
    }

    peerConnection.onicecandidate = async (event) => {
        if (event.candidate) {
            client.sendMessageToPeer({
                text: JSON.stringify({
                    'type': 'candidate',
                    'candidate': event.candidate
                })
            }, MemberId)

        }
    }
}

let createOffer = async (MemberId) => {
 await createPeerConnection(MemberId)

    let offer = await peerConnection.createOffer()
    await peerConnection.setLocalDescription(offer)

    client.sendMessageToPeer({text: JSON.stringify({'type': 'offer', 'offer': offer})}, MemberId)
}

let createAnswer = async (MemberId, offer) => {
    await createPeerConnection(MemberId)

    await peerConnection.setRemoteDescription(offer)

    let answer = await peerConnection.createAnswer()

    await peerConnection.setLocalDescription(answer)

    client.sendMessageToPeer({text: JSON.stringify({'type': 'answer', 'answer': answer})}, MemberId)

}

init()
