import React, { useState, useEffect, useCallback } from 'react';
import {
    Box,
    Center,
    Flex,
    Heading
} from '@chakra-ui/react';
import ColorIndicator from './ColorIndicator';
import {
    GoogleMap,
    useJsApiLoader,
    Marker
} from '@react-google-maps/api';

const containerStyle = {
  width: '100%',
  height: '250px'
};

const center = {
  lat: -7.7796875,
  lng: 110.4119574
};

const DistributionMap = () => {
    const [map, setMap] = useState(null);

    const { isLoaded } = useJsApiLoader({
        id: 'google-map-script',
        googleMapsApiKey: "AIzaSyBWqffhGu-f9WUyhxJT-4nqtF-CBS4HYOs"
    });

    const onLoad = (map) => {
        const bounds = new window.google.maps.LatLngBounds(center);
        map.fitBounds(bounds);
        setMap(map)
    }

    const onUnmount = () => {
        setMap(null)
    }

    return isLoaded ? (
        <Box w='60%' mr={10}>
            <Flex direction={'column'}>
                <Box p={'10px'} bg={'white'} color='gray'>
                    <Heading fontSize='16px' as={'h5'}>Persebaran Harga Udang Size 100</Heading>
                </Box>
                <GoogleMap
                    mapContainerStyle={containerStyle}
                    center={center}
                    zoom={6}
                    onLoad={onLoad}
                    onUnmount={onUnmount}
                >
                    { /* Child components, such as markers, info windows, etc. */ }
                    <></>
                </GoogleMap>
                <Box bg={'white'} py='10px'>
                    <Center>
                        <ColorIndicator color='gray' text='> 1 Bulan' />
                        <ColorIndicator color='#133878' text='> 1 Minggu' />
                        <ColorIndicator color='#1b77df' text='Baru' />
                    </Center>
                </Box>
            </Flex>
        </Box>
      ) : (<></>);
}

export default DistributionMap;